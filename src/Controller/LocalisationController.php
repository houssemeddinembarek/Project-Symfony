<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Localisation;
use App\Form\LocalisationType;

class LocalisationController extends AbstractController
{
    /**
     * @Route("/localisation", name="localisation")
     */
    public function index(): Response
    {
        return $this->render('localisation/index.html.twig', [
            'controller_name' => 'LocalisationController',
        ]);
    }

    /**
     * @Route("localisation/new")
     */
    public function newLocalisation(Request $request){
        $localisation = new Localisation();
        $form = $this->createForm(LocalisationType::class,$localisation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($localisation);
            $entityManager->flush();
        }
        return $this->render('article/newLocalisation.html.twig' , [
            'form' => $form->createView()
        ]);
    }

}
