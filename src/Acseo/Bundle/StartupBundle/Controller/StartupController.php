<?php

namespace Acseo\Bundle\StartupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupBundle\Entity\Startup;

/**
 * Startup controller.
 *
 * @Route("/startup")
 */
class StartupController extends Controller
{
    /**
     * Lists all Startup entities.
     *
     * @Route("/", name="startup")
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
     * @Route("/{id}/show", name="startup_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Startup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Startup entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

}
