<?php
namespace App\Controller;

use App\Entity\Immo; 
use App\Repository\ImmoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;

class VenteController extends AbstractController
{
    /**
     * @var ImmoRepository
     */
    private $rep;
    
    /**
     * @var ObjectManager
     */
    private $em;
    
    public function __construct(ImmoRepository $rep,ObjectManager $em) 
    {
        $this->repository=$rep;
        $this->em=$em;
    }

    public function ventes()
    { 
        /*$bien=new Immo();
        $bien->setTitre('Maison de village avec terrasse et jardin')
                ->setPrix(185000)
                ->setVille('Monestiés');
        $em=$this->getDoctrine()->getManager();
        */
        
        $bien=$this->repository->findByPrix(180000,200000);
        
        /*$date = new \DateTime('@'.strtotime('now'));
        $bien[0]->setDate($date);
         $this->em->flush();
         */
        return $this->render('immo/vente.html.twig',['bien'=>$bien]);
    }
    
    
    
    public function voir($slug,$id)
    {
        $bien=$this->repository->find($id);
        #dump($bien);
        return $this->render('immo/bien.html.twig',[
            'bien'=>$bien
        ]);
    }
    
}