<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'submit_form' => "/contact/submit",
        ]);
    }
}
?>