<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Photos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\PhotosRepository;
use Doctrine\Common\Persistence\ObjectManager;

class AdminPhotosController extends AbstractController
{
   
    
    /**
     * @var ObjectManager
     */
    private $em;
    
    
    
    public function supprimephoto(Photos $photo, Request $request,ObjectManager $em)
    {
        
        
        $data =json_decode($request->getContent(), true);
        if($this->isCsrfTokenValid('delete'.$photo->getId(),$data['_token'])){
            $em=$this->getDoctrine()->getManager();
            $em->remove($photo);
            $em->flush();
            return new  JsonResponse(['success'=>1]);
        }
         
        return new  JsonResponse(['error'=>'Token invalide']);
        
        
    }
}