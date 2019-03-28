<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\InteretsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Interets;
use App\Form\InteretsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminInteretsController extends AbstractController
{
    
    /**
     * @var InteretsRepository
     */
    private $rep;
    
    /**
     * @var ObjectManager
     */
    private $em;
    
    public function __construct(InteretsRepository $rep,ObjectManager $em) 
    {
        $this->repository=$rep;
        $this->em=$em;
    }
    
    public function index()
    {
        $interets=$this->repository->findAll();
        return $this->render('interets/admin/indexinteret.html.twig', compact('interets'));
        
    }
     
     
    public function nouvel( Request $request)
    {
        
        $ninteret=new Interets();
        #dump($ninteret);
        $form=$this->createForm(InteretsType::class,$ninteret);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($ninteret);
            $this->em->flush();
            return $this->redirectToRoute('admininterets');
        }
        return $this->render('interets/admin/nouveauinteret.html.twig',[
            'interet'=>$ninteret,
            'form'=>$form->createView()
            
        ]);
        
    }
    
    public function edit(Interets $interet, Request $request)
    {
        #$interet=$this->repository->find($id);
        #dump($interet);
        $form=$this->createForm(InteretsType::class,$interet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            return $this->redirectToRoute('admininterets');
        }
        return $this->render('interets/admin/editinteret.html.twig',[
            'interet'=>$interet,
            'form'=>$form->createView()
            
        ]);
        
    }
    
    public function supprime(Interets $interet, Request $request)
    {
        
        if($this->isCsrfTokenValid('delete'.$interet->getId(),$request->get('_token'))){
            $this->em->remove($interet);
            $this->em->flush();
            return $this->redirectToRoute('admininterets');
        }
         #return new Response('Suppression');
         return $this->redirectToRoute('admininterets');
        
        
    }
    
    
}