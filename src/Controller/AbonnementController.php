<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Abonnement;
use App\Form\AjoutAbonnementType;
use App\Form\ModifAbonnementType;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/ajout_abonnement", name="ajout_abonnement")
     */
    public function index(Request $request): Response
    {
       
        $abonnement = new Abonnement();
       
        $form = $this->createForm(AjoutAbonnementType::class,$abonnement);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){           
            $em = $this->getDoctrine()->getManager();              
            $em->persist($abonnement);              
            $em->flush();   
          
         
         
          } 
          return $this->redirectToRoute('ajout_abonnement');
        }
        
     
        return $this->render('ajout_abonnement/ajout_abonnement.html.twig', [
          'form'=>$form->createView()
        ]);
    }


    /**
     * @Route("/liste_abonnements", name="liste_abonnements")
     */
    public function listeAbonnement(Request $request)
    {
      $em = $this->getDoctrine();
      $repoAbonnement = $em-> getRepository(Abonnement::class);
      if ($request->get('supp')!=null){
        $abonnement = $repoAbonnement->find($request->get('supp'));
        if($abonnement!=null){
            $em->getManager()->remove($abonnement);
            $em->getManager()->flush();
        }
        return $this->redirectToRoute('liste_abonnements');
      }
      $abonnements = $repoAbonnement->findBy(array(),array('prix'=>'ASC'));
    return $this->render('liste_abonnements/liste_abonnements.html.twig', [
    'abonnements'=>$abonnements
  ]);
}



/**
     * @Route("/modif_abonnement/{id}", name="modif_abonnement", requirements={"id"="\d+"})
     */
    public function modifAbonnement(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoAbonnement = $em->getRepository(Abonnement::class);
        $abonnement = $repoAbonnement->find($id);

        if($abonnement==null){
            $this->addFlash('notice', "Cet abonnement n'existe pas");
            return $this->redirectToRoute('liste_abonnements');
        }

        $form = $this->createForm(ModifAbonnementType::class,$abonnement);

        if ($request->isMethod('POST')) {            
            $form->handleRequest($request);            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($abonnement);
                $em->flush();    

                $this->addFlash('notice', 'Abonnement modifié');

            }
            return $this->redirectToRoute('liste_abonnements');
        }        

        return $this->render('modif_abonnement/modif_abonnement.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
