<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


/**
 * @Route("/entreprise")
 */
class EntrepriseController extends AbstractController
{
    /**
     * @Route("/index", name="entreprise_index")
     */
    public function index(ArticleRepository $repository): Response
    {

        $entreprise = $repository->findBy(
            ['category' => '9']
        );

        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprise,
        ]);
    }
}
