<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Utils\ErrorCode;
use AppBundle\Utils\SuccessCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/admin/")
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('admin/index.html.twig', []);
    }
}
