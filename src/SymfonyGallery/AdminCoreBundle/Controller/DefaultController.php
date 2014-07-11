<?php

namespace SymfonyGallery\AdminCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdminCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
