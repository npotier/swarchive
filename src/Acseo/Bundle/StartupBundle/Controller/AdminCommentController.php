<?php

namespace Acseo\Bundle\StartupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupBundle\Entity\Comment;
use Acseo\Bundle\StartupBundle\Form\CommentType;

/**
 * Comment controller.
 *
 * @Route("/admin/comment")
 */
class AdminCommentController extends Controller
{
    /**
     * Lists all Comment entities.
     *
     * @Route("/", name="admin_comment")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcseoStartupBundle:Comment')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Comment entity.
     *
     * @Route("/{id}/show", name="admin_comment_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Comment entity.
     *
     * @Route("/new", name="admin_comment_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Comment();
        $form   = $this->createForm(new CommentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Comment entity.
     *
     * @Route("/create", name="admin_comment_create")
     * @Method("post")
     * @Template("AcseoStartupBundle:Comment:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Comment();
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_comment_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Comment entity.
     *
     * @Route("/{id}/edit", name="admin_comment_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm = $this->createForm(new CommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Comment entity.
     *
     * @Route("/{id}/update", name="admin_comment_update")
     * @Method("post")
     * @Template("AcseoStartupBundle:Comment:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm   = $this->createForm(new CommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_comment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Comment entity.
     *
     * @Route("/{id}/delete", name="admin_comment_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AcseoStartupBundle:Comment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_comment'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
