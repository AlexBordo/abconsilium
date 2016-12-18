<?php

namespace ABconsiliumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABconsiliumBundle:Default:index.html.twig');
    }
}
