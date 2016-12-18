<?php

namespace ABconsiliumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABconsiliumBundle:Admin:index.html.twig', array(
            // ...
        ));
    }

}
