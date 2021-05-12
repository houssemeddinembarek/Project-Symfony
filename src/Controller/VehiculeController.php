<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;



/**
 * @Route("/vehicule")
 */
class VehiculeController extends AbstractController
{
    /**
     * @Route("/index", name="vehicule_index")
     */
    public function index(ArticleRepository $repository): Response
    {
        $vehicule = $repository->findBy(
            ['category' => '3']
        );

        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehicule,
        ]);
    }
}
