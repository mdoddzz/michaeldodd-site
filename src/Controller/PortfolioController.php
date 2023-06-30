<?php

namespace App\Controller;

use App\Entity\ContactForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class PortfolioController extends AbstractController
{
    public function portfolio(): Response
    {
        return $this->render('pages/portfolio.html.twig');
    }
}
