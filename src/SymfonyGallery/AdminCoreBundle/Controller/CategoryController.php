<?php

namespace SymfonyGallery\AdminCoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SymfonyGallery\AdminCoreBundle\Entity\Category;
use SymfonyGallery\AdminCoreBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{/**
 * Lists all Category entities.
 *
 */
    public function indexAction()
    {
        if($this->get('security.context')->getToken()->getUser()->getRoles()[0] != 'ROLE_SUPER_ADMIN') {
            return $this->redirect('/login');
        }

        $category = $this->getDoctrine()->getRepository('AdminCoreBundle:Category')->findAll();

        echo '<pre>';
        \Doctrine\Common\Util\Debug::dump($category);
        echo '</pre>';



        return $this->render('AdminCoreBundle:Category:index.html.twig', array(
            'entities' => $category
        ));
    }
    /**
     * Creates a new Category entity.
     *
     */
    public function createAction(Request $request)
    {
        if($this->get('security.context')->getToken()->getUser()->getRoles()[0] != 'ROLE_SUPER_ADMIN') {
            return $this->redirect('/login');
        }
        $entity = new Category();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('category_show', array('id' => $entity->getId())));
        }

        return $this->render('AdminCoreBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Category entity.
     *
     * @param Category $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Category entity.
     *
     */
    public function newAction()
    {
        if($this->get('security.context')->getToken()->getUser()->getRoles()[0] != 'ROLE_SUPER_ADMIN') {
            return $this->redirect('/login');
        }
        $entity = new Category();
        $form   = $this->createCreateForm($entity);

        return $this->render('AdminCoreBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
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

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AdminCoreBundle:Category:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminCoreBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AdminCoreBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Category entity.
    *
    * @param Category $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('category_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Category entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if($this->get('security.context')->getToken()->getUser()->getRoles()[0] != 'ROLE_SUPER_ADMIN') {
            return $this->redirect('/login');
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminCoreBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('category_edit', array('id' => $id)));
        }

        return $this->render('AdminCoreBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Category entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if($this->get('security.context')->getToken()->getUser()->getRoles()[0] != 'ROLE_SUPER_ADMIN') {
            return $this->redirect('/login');
        }
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminCoreBundle:Category')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('category'));
    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
