<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Theme;
use App\Form\AjoutThemeType;
use App\Form\ModifThemeType;
use App\Repository\ThemeRepository;

class AjoutThemeController extends AbstractController
{
    /**
     * @Route("/ajout_theme", name="ajout_theme")
     */
    public function ajoutTheme(Request $request)
    {
        $theme = new Theme();
       
        $form = $this->createForm(AjoutThemeType::class,$theme);        
        
        if ($request->isMethod('POST')){            
          $form -> handleRequest ($request);            
          if($form->isValid()){              
            $em = $this->getDoctrine()->getManager();              
            $em->persist($theme);              
            $em->flush();        
          $this->addFlash('notice','Thème ajouté'); 
         
          } 
          return $this->redirectToRoute('ajout_theme');
        }
        
     
        return $this->render('ajout_theme/index.html.twig', [
          'form'=>$form->createView()
        ]);
    }
}
