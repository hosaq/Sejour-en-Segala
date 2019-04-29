<?php
namespace App\Controller;

use App\Entity\Immo; 
use App\Form\BienRechercheType;
use App\Entity\BienRecherche;
use App\Repository\ImmoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

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

    public function ventes(PaginatorInterface $paginator,Request $request)
    { 
        $recherche=new BienRecherche();
        $form= $this->createForm(BienRechercheType::class, $recherche);
        $form->handleRequest($request);
        
        $bien=$paginator->paginate(
                $this->repository->findAllVisibleQuery($recherche),
                $request->query->getInt('page', 1),
                12
        
        );
        return $this->render('immo/ventemoderne.html.twig',[
            'bien'=>$bien,
            'form'=>$form->createView()
            ]);
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