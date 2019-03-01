<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    
    
    
    public function index()
    {
        return $this->render('immo/home.html.twig');
    }
    
    public function promesse()
    {
        return $this->render('promesse.html.twig');
    }
    
}
