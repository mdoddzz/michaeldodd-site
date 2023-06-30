<?php
namespace App\Controller;

use App\Entity\ContactForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'submit_form' => "/contact/submit",
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