<?php
namespace App\Controller;

use App\Entity\ContactForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    public function contact(): Response
    {
        // creates a contactForm object
        $contactForm = new ContactForm();

        $form = $this->createFormBuilder($contactForm)
            ->setAction($this->generateUrl('contact_submit'))
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        return $this->render('pages/contact.html.twig', [
            'form' => $form
        ]);
    }

    public function submitContact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = new ContactForm();

        $form->setName($request->get("name"));
        $form->setEmail($request->get('email'));
        $form->setMessage($request->get('message'));

        // tell Doctrine you want to (eventually) save the form (no queries yet)
        $entityManager->persist($form);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        // look to change to redirect to contact with success message to avoid resubmit by refresh
        return $this->render('pages/contact.html.twig', [
            'success' => true,
        ]);
    }
}
?>