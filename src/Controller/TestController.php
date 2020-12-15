<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Tests;
use App\Repository\TestRepository;
use App\Form\AjoutTestType;

class TestController extends AbstractController
{
    /**
     * @Route("/ajout_test", name="ajout_test")
     */
    public function index(Request $request)
    {
        $test = new Tests();
       
        $form = $this->createForm(AjoutTestType::class,$test);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){              
            $em = $this->getDoctrine()->getManager();              
            $em->persist($test);              
            $em->flush();        
          $this->addFlash('notice','Test ajouté'); 
         
          } 
          return $this->redirectToRoute('ajout_test');
        }
        
     
        return $this->render('ajout_test/index.html.twig', [
          'form'=>$form->createView()
        ]);
    }

}
