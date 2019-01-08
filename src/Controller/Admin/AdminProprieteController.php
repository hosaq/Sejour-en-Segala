<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ImmoRepository;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Immo;
use App\Form\ProprieteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminProprieteController extends AbstractController
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
    
    public function index()
    {
        $proprietes=$this->repository->findAll();
        return $this->render('immo/admin/index.html.twig', compact('proprietes'));
        
    }
     
     
    public function nouveau( Request $request)
    {
        
        $nbien=new Immo();
        #dump($nbien);
        $form=$this->createForm(ProprieteType::class,$nbien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($nbien);
            $this->em->flush();
            return $this->redirectToRoute('admin');
        }
        return $this->render('immo/admin/nouveau.html.twig',[
            'bien'=>$nbien,
            'form'=>$form->createView()
            
        ]);
        
    }
    
    public function edit(Immo $bien, Request $request)
    {
        #$bien=$this->repository->find($id);
        #dump($bien);
        $form=$this->createForm(ProprieteType::class,$bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            return $this->redirectToRoute('admin');
        }
        return $this->render('immo/admin/edit.html.twig',[
            'bien'=>$bien,
            'form'=>$form->createView()
            
        ]);
        
    }
    
    public function supprime(Immo $bien, Request $request)
    {
        
        if($this->isCsrfTokenValid('delete'.$bien->getId(),$request->get('_token'))){
            $this->em->remove($bien);
            $this->em->flush();
            return $this->redirectToRoute('admin');
        }
         #return new Response('Suppression');
         return $this->redirectToRoute('admin');
        
        
    }
    
    
}