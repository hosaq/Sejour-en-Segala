<?php
namespace App\Controller;

use App\Entity\Interets; 
use App\Form\InteretsRechercheType;
use App\Entity\InteretsRecherche;
use App\Repository\InteretsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class LoisirController extends AbstractController
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

    public function loisirs(PaginatorInterface $paginator,Request $request)
    { 
        $recherche=new InteretsRecherche();
        $form= $this->createForm(InteretsRechercheType::class, $recherche);
        $form->handleRequest($request);
        
        $loisir=$paginator->paginate(
                $this->repository->findAllVisibleQuery($recherche),
                $request->query->getInt('page', 1),
                12
        
        );
        return $this->render('interets/loisirs.html.twig',[
            'loisir'=>$loisir,
            'form'=>$form->createView()
            ]);
    }
    
    
    
    public function voir($slug,$id)
    {
        $loisir=$this->repository->find($id);
        #dump($bien);
        return $this->render('interets/loisir.html.twig',[
            'loisir'=>$loisir
        ]);
    }
    
}