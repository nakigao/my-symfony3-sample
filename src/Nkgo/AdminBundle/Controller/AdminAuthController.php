<?php

namespace Nkgo\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthController extends Controller
{
    /**
     * @Route("/admin_auth/login/")
     */
    public function loginAction()
    {
        return new Response('LOGIN');
    }

    /**
     * @Route("/admin_auth/logout/")
     */
    public function logoutAction()
    {
        return new Response('LOGOUT');
    }
}
