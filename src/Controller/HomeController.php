<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(): Response
    {

        // Calculate years been a developer
        $start = new \DateTime("2017-08-15");
        $current = new \DateTime();
        $interval = $start->diff($current);
        $years = $interval->y; 

        return $this->render('pages/index.html.twig', [
            'years' => $years
        ]);
    }
}
?>