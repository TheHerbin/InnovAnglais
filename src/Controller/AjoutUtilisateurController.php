<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Utilisateur;
use App\Form\AjoutUtilisateurType;


class AjoutUtilisateurController extends AbstractController
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
}
