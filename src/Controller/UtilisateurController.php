<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Utilisateur;
use App\Form\AjoutUtilisateurType;
use App\Form\ModifUtilisateurType;


class UtilisateurController extends AbstractController
{
    /**
     * @Route("/ajout_utilisateur", name="ajout_utilisateur")
     */
    public function index(Request $request): Response
    {
        $utilisateur = new Utilisateur();
       
        $form = $this->createForm(AjoutUtilisateurType::class,$utilisateur);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){           
            $em = $this->getDoctrine()->getManager();              
            $em->persist($utilisateur);              
            $em->flush();   
          
         
         
          } 
          return $this->redirectToRoute('ajout_utilisateur');
        }
        
     
        return $this->render('ajout_utilisateur/index.html.twig', [
          'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/liste_utilisateurs", name="liste_utilisateurs")
     */
    public function listeUtilisateurs(Request $request)
    {
      $em = $this->getDoctrine();
      $repoUtilisateur = $em-> getRepository(Utilisateur::class);
      if ($request->get('supp')!=null){
        $utilisateur = $repoUtilisateur->find($request->get('supp'));
        if($utilisateur!=null){
            $em->getManager()->remove($utilisateur);
            $em->getManager()->flush();
        }
        return $this->redirectToRoute('liste_utilisateurs');
      }
      $utilisateurs = $repoUtilisateur->findBy(array(),array('entreprise'=>'ASC'));
    return $this->render('liste_utilisateurs/liste_utilisateurs.html.twig', [
    'utilisateurs'=>$utilisateurs
  ]);
}

  /**
     * @Route("/modif_utilisateur/{id}", name="modif_utilisateur", requirements={"id"="\d+"})
     */
    public function modifTheme(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoUtilisateur = $em->getRepository(Utilisateur::class);
        $utilisateur = $repoUtilisateur->find($id);

        if($utilisateur==null){
            $this->addFlash('notice', "Cet utilisateur n'existe pas");
            return $this->redirectToRoute('liste_utilisateur');
        }

        $form = $this->createForm(ModifUtilisateurType::class,$utilisateur);

        if ($request->isMethod('POST')) {            
            $form->handleRequest($request);            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();    

                $this->addFlash('notice', 'Utilisateur modifié');

            }
            return $this->redirectToRoute('liste_utilisateurs');
        }        

        return $this->render('modif_utilisateur/modif_utilisateur.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    
}
