<?php

namespace Acseo\Bundle\StartupWeekendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupWeekendBundle\Entity\Location;

/**
 * Location controller.
 *
 * @Route("/location")
 */
class LocationController extends Controller
{
    /**
     * Lists all Location entities.
     *
     * @Route("/", name="location")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcseoStartupWeekendBundle:Location')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Location entity.
     *
     * @Route("/{id}/show", name="location_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupWeekendBundle:Location')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Location entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Display the list of existing locations.
     *
     * @Route("/list", name="location_list")
     * @Template()
     */
    public function locationListAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $locationList = $em->getRepository('AcseoStartupWeekendBundle:Location')->findAll();
        
        return array("locationList" => $locationList);   
    }

}
