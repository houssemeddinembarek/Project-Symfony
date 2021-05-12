<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


/**
 * @Route("/informatiquemultimedia")
 */
class InformatiquemultimediaController extends AbstractController
{
    /**
     * @Route("/index", name="informatiquemultimedia_index")
     */
    public function index(ArticleRepository $repository): Response
    {
        $info = $repository->findBy(
            ['category' => '6']
        );

        return $this->render('informatiquemultimedia/index.html.twig', [
            'infos' => $info,
        ]);
    }
}
