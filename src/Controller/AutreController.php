<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;



/**
 * @Route("/autre")
 */
class AutreController extends AbstractController
{
    /**
     * @Route("/index", name="autre_index")
     */
    public function index(ArticleRepository $repository): Response
    {

        $autre = $repository->findBy(
            ['category' => '11']
        );

        return $this->render('autre/index.html.twig', [
            'autres' => $autre,
        ]);
    }
}
