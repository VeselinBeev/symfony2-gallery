<?php

namespace SymfonyGallery\GalleryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SymfonyGallery\GalleryBundle\Entity\UserFolder;
use SymfonyGallery\GalleryBundle\Form\UserFolderType;

/**
 * UserFolder controller.
 *
 */
class UserFolderController extends Controller
{

    /**
     * Lists all UserFolder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GalleryBundle:UserFolder')->findAll();

        return $this->render('GalleryBundle:UserFolder:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserFolder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserFolder();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('userfolder_show', array('id' => $entity->getId())));
        }

        return $this->render('GalleryBundle:UserFolder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UserFolder entity.
     *
     * @param UserFolder $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserFolder $entity)
    {
        $form = $this->createForm(new UserFolderType(), $entity, array(
            'action' => $this->generateUrl('userfolder_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserFolder entity.
     *
     */
    public function newAction()
    {
        $entity = new UserFolder();
        $form   = $this->createCreateForm($entity);

        return $this->render('GalleryBundle:UserFolder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserFolder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GalleryBundle:UserFolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserFolder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GalleryBundle:UserFolder:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserFolder entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GalleryBundle:UserFolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserFolder entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GalleryBundle:UserFolder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserFolder entity.
    *
    * @param UserFolder $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserFolder $entity)
    {
        $form = $this->createForm(new UserFolderType(), $entity, array(
            'action' => $this->generateUrl('userfolder_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserFolder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GalleryBundle:UserFolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserFolder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userfolder_edit', array('id' => $id)));
        }

        return $this->render('GalleryBundle:UserFolder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserFolder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GalleryBundle:UserFolder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserFolder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('userfolder'));
    }

    /**
     * Creates a form to delete a UserFolder entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userfolder_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
