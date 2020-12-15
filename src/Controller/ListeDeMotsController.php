<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListeDeMots;
use App\Form\ListeDeMotType;
use App\Repository\ListeDeMotsRepository;
use App\Form\Mot;

class ListeDeMotsController extends AbstractController
{
    /**
     * @Route("ajout_listedemot", name="ajout_listedemot")
     */
    public function index(): Response
    {
        $listedemots = new ListeDeMots();
       
        $form = $this->createForm(ListeDeMotType::class,$listedemots);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){              
            $em = $this->getDoctrine()->getManager();              
            $em->persist($listedemots);              
            $em->flush();        
          $this->addFlash('notice','Liste ajouté'); 
         
          } 
          return $this->redirectToRoute('ajout_listedemot');
        }
        
     
        return $this->render('ajout_listedemot/index.html.twig', [
          'form'=>$form->createView()
        ]);
    }
}
