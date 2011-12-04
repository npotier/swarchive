<?php

namespace Acseo\Bundle\StartupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupBundle\Entity\Tags;
use Acseo\Bundle\StartupBundle\Form\TagsType;

/**
 * Tags controller.
 *
 * @Route("/admin/tags")
 */
class AdminTagsController extends Controller
{
    /**
     * Lists all Tags entities.
     *
     * @Route("/", name="admin_tags")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcseoStartupBundle:Tags')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Tags entity.
     *
     * @Route("/{id}/show", name="admin_tags_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Tags')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tags entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Tags entity.
     *
     * @Route("/new", name="admin_tags_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tags();
        $form   = $this->createForm(new TagsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Tags entity.
     *
     * @Route("/create", name="admin_tags_create")
     * @Method("post")
     * @Template("AcseoStartupBundle:Tags:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Tags();
        $request = $this->getRequest();
        $form    = $this->createForm(new TagsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tags_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Tags entity.
     *
     * @Route("/{id}/edit", name="admin_tags_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Tags')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tags entity.');
        }

        $editForm = $this->createForm(new TagsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tags entity.
     *
     * @Route("/{id}/update", name="admin_tags_update")
     * @Method("post")
     * @Template("AcseoStartupBundle:Tags:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Tags')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tags entity.');
        }

        $editForm   = $this->createForm(new TagsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tags_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Tags entity.
     *
     * @Route("/{id}/delete", name="admin_tags_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AcseoStartupBundle:Tags')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tags entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_tags'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
