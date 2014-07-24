<?php

namespace SymfonyGallery\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GalleryBundle:Default:index.html.twig', array('name' => $name));
    }
}
