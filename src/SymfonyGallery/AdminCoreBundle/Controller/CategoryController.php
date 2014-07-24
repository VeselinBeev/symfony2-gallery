<?php

namespace SymfonyGallery\AdminCoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Debug\Debug;
use SymfonyGallery\AdminCoreBundle\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminCoreBundle:Category')->findAll();

        echo '<pre>';
        \Doctrine\Common\Util\Debug::dump($entities);
        echo '</pre>';


        return $this->render('AdminCoreBundle:Category:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminCoreBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('AdminCoreBundle:Category:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
