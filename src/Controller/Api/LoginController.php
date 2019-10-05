<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Response\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LoginController
 */
class LoginController extends BaseController
{
    /**
     * @Route("/login_check")
     * @param Request $request
     *
     * @param Entity  $response
     *
     * @return Response
     */
    public function checkLogin(Request $request, Entity $response)
    {
        $user = new User();

        $user->setEmail($request->get('email'));
        $user->setPassword($request->get('password'));


        return $this->handleResponseView($response->setEntity($user));
    }
}
