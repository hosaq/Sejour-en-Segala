<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    
    
    
    public function index()
    {
        return $this->render('immo/home.html.twig');
    }
    
}
