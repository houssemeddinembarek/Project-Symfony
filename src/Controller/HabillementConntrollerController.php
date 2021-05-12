<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;




/**
 * @Route("/habillement")
 */
class HabillementConntrollerController extends AbstractController
{
    /**
     * @Route("/index", name="habillement_index")
     */
    public function index(ArticleRepository $repository): Response
    {

        $habillement = $repository->findBy(
            ['category' => '8']
        );

        return $this->render('habillement_conntroller/index.html.twig', [
            'habillements' => $habillement,
        ]);
    }
}
