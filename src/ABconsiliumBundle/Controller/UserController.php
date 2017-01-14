<?php

namespace ABconsiliumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function getUserAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('ABconsiliumBundle:User:getUser.html.twig', array(
            // ...
        ));
    }

    public function createUserAction(Request $request)
    {
        return $this->render('ABconsiliumBundle:User:getUser.html.twig', array(
            // ...
        ));
    }

    public function updateUserAction()
    {
        return $this->render('ABconsiliumBundle:User:getUser.html.twig', array(
            // ...
        ));
    }

    public function deleteUserAction()
    {
        return $this->render('ABconsiliumBundle:User:getUser.html.twig', array(
            // ...
        ));
    }
}
