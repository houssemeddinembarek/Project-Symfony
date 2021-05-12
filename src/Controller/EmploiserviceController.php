<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


/**
 * @Route("/emploiservice")
 */
class EmploiserviceController extends AbstractController
{
    /**
     * @Route("/index", name="emploiservice_index")
     */
    public function index(ArticleRepository $repository): Response
    {

        $emploi = $repository->findBy(
            ['category' => '7']
        );

        return $this->render('emploiservice/index.html.twig', [
            'emplois' => $emploi,
        ]);
    }
}
