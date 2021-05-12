<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


/**
 * @Route("/maisonjardin")
 */
class MaisonjardinController extends AbstractController
{
    /**
     * @Route("/index", name="maisonjardin_index")
     */
    public function index(ArticleRepository $repository): Response
    {
        $maison = $repository->findBy([
            'category' => '4'
        ]);

        return $this->render('maisonjardin/index.html.twig', [
            'maisons' => $maison,
        ]);
    }
}
