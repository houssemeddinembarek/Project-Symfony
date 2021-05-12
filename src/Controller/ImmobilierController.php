<?php

namespace App\Controller;

use App\Entity\Immobilier;
use App\Form\ImmobilierType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/immobilier")
 */
class ImmobilierController extends AbstractController
{

    /**
     * @Route("/index", name="immobilier_index")
     */
    public function index(ArticleRepository $repository): Response
    {
        $immobilier = $repository->findBy(
            ['category' => '1']
        );
        
        return $this->render('immobilier/index.html.twig', [
            'immobiliers' => $immobilier
        ]);
    }


    /**
     * @Route("/new" , name="immobilier_new")
     */
    public function new(Request $request){
        $immobilier = new Immobilier();
        $form = $this->createForm(ImmobilierType::class , $immobilier);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $imageFile = $form->get('image')->getData();
            $fileName = md5(uniqid()).'.'.$imageFile->guessExtension();
            $imageFile->move($this->getparameter('image_directory') , $fileName);
            $article->setImage($fileName);

            $immobilier = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($immobilier);
            $entityManager->flush();
            return $this->redirectToRoute('immobilier_list');
        }
        return $this->render('immobilier/new.html.twig',[
            'form' => $form->createView()
        ]);
    }


}
