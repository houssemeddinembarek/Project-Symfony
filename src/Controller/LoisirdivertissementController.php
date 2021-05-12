<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


/**
 * @Route("/loisirdivertissement")
 */
class LoisirdivertissementController extends AbstractController
{
    /**
     * @Route("/index", name="loisirdivertissement_index")
     */
    public function index(ArticleRepository $repository): Response
    {

        $loisir = $repository->findBy(
            ['category' => '5']
        );

        return $this->render('loisirdivertissement/index.html.twig', [
            'loisirs' => $loisir,
        ]);
    }
}
