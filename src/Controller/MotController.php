<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Mot;
use App\Form\AjoutMotType;
use App\Form\ModifMotType;
use App\Repository\MotRepository;

class MotController extends AbstractController
{
    /**
     * @Route("/ajout_mot", name="ajout_mot")
     */
    public function ajoutMot(Request $request)
    {
        $mot = new Mot();
       
        $form = $this->createForm(AjoutMotType::class,$mot);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){              
            $em = $this->getDoctrine()->getManager();              
            $em->persist($mot);              
            $em->flush();        
          $this->addFlash('notice','Mot ajouté'); 
         
          } 
          return $this->redirectToRoute('ajout_mot');
        }
        
     
        return $this->render('ajout_mot/index.html.twig', [
          'form'=>$form->createView()
        ]);
    }

     /**
     * @Route("/liste_mots", name="liste_mots")
     */
    public function listeMots(Request $request)
    {
      $em = $this->getDoctrine();
      $repoMot = $em-> getRepository(Mot::class);

      if ($request->get('supp')!=null){
        $mots = $repoMot->find($request->get('supp'));
        if($mots!=null){
            $em->getManager()->remove($mots);
            $em->getManager()->flush();
        }
        return $this->redirectToRoute('liste_mots');
      }
      $mots = $repoMot->findBy(array(),array('libelle'=>'ASC'));
    return $this->render('liste_mots/liste_mots.html.twig', [
    'mots'=>$mots
  ]);
}

/**
     * @Route("/modif_mot/{id}", name="modif_mot", requirements={"id"="\d+"})
     */
    public function modifMot(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoMot = $em->getRepository(Mot::class);
        $mot = $repoMot->find($id);

        if($mot==null){
            $this->addFlash('notice', "Ce mot n'existe pas");
            return $this->redirectToRoute('liste_mots');
        }

        $form = $this->createForm(ModifMotType::class,$mot);

        if ($request->isMethod('POST')) {            
            $form->handleRequest($request);            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($mot);
                $em->flush();    

                $this->addFlash('notice', 'mot modifié');

            }
            return $this->redirectToRoute('liste_mots');
        }        

        return $this->render('modif_mot/modif_mot.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}