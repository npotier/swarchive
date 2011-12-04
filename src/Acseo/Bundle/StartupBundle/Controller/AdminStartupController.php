<?php

namespace Acseo\Bundle\StartupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupBundle\Entity\Startup;
use Acseo\Bundle\StartupBundle\Form\StartupType;

/**
 * Startup controller.
 *
 * @Route("/admin/startup")
 */
class AdminStartupController extends Controller
{
    /**
     * Lists all Startup entities.
     *
     * @Route("/", name="admin_startup")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcseoStartupBundle:Startup')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Startup entity.
     *
     * @Route("/{id}/show", name="admin_startup_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Startup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Startup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Startup entity.
     *
     * @Route("/new", name="admin_startup_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Startup();
        $form   = $this->createForm(new StartupType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Startup entity.
     *
     * @Route("/create", name="admin_startup_create")
     * @Method("post")
     * @Template("AcseoStartupBundle:Startup:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Startup();
        $request = $this->getRequest();
        $form    = $this->createForm(new StartupType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_startup_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Startup entity.
     *
     * @Route("/{id}/edit", name="admin_startup_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Startup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Startup entity.');
        }

        $editForm = $this->createForm(new StartupType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Startup entity.
     *
     * @Route("/{id}/update", name="admin_startup_update")
     * @Method("post")
     * @Template("AcseoStartupBundle:Startup:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Startup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Startup entity.');
        }

        $editForm   = $this->createForm(new StartupType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_startup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Startup entity.
     *
     * @Route("/{id}/delete", name="admin_startup_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AcseoStartupBundle:Startup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Startup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_startup'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
