<?php

namespace ABconsiliumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
        return $this->render('ABconsiliumBundle:Security:login.html.twig', array(
            // ...
        ));
    }

}
