<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="app_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="dashboard")
     * @Route("{_locale}", methods={"GET"}, name="dashboard_locale")
     *
     * @return Response
     */
    public function dashboard(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }

    /**
     * @Route("/page1", methods={"GET"}, name="page1")
     *
     * @return Response
     */
    public function page1(): Response
    {
        return $this->render('dashboard/page1.html.twig');
    }
}
