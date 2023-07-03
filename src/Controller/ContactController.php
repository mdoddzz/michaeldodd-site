<?php
namespace App\Controller;

use App\Entity\ContactForm;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    public function contact(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        // creates a contactForm object
        $contactForm = new ContactForm();

        $form = $this->createFormBuilder($contactForm)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('requestCV', CheckboxType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save contact details to database
            $entityManager->persist($contactForm);
            $entityManager->flush();

            // Send email with details
            $email = (new Email())
                ->from('no-reply@michaeldodd.co.uk')
                ->to('whomjd5@gmail.com')
                ->subject('Time for Symfony Mailer!')
                ->text("test")
                ->html('<p>See Twig integration for better HTML integration!</p>') ;

            try {
                $mailer->send($email);
            } catch (TransportExceptionInterface $e) {
                // Handle mail send error
            }

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('pages/contact.html.twig', [
            'form' => $form
        ]);
    }

    public function success(): Response
    {
        return $this->render('pages/contact_success.html.twig');
    }
}
