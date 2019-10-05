<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Response\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/register")
     * @param Request $request
     *
     * @param Entity  $response
     *
     * @return Response
     */
    public function register(Request $request, Entity $response)
    {
        $user = new User();

        $user->setEmail($request->get('email'));
        $user->setPassword($request->get('password'));


        return $this->handleResponseView($response->setEntity($user));
    }
}
