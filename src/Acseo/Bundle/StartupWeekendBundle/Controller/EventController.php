<?php

namespace Acseo\Bundle\StartupWeekendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acseo\Bundle\StartupWeekendBundle\Entity\Event;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event controller.
 *
 * @Route("/event")
 */
class EventController extends Controller
{
    /**
     * Lists all Event entities.
     *
     * @Route("/", name="event")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AcseoStartupWeekendBundle:Event')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Event entity.
     *
     * @Route("/{id}/show", name="event_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupWeekendBundle:Event')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Finds and displays lastEvents
     *
     * @Route("/lastEvents/{max}", name="event_last")
     * @Template()
     */
    public function lastEventsAction($max)
    {
        $em = $this->getDoctrine()->getEntityManager();

        // $query = $em->createQuery("SELECT e FROM Acseo\Bundle\StartupWeekendBundle\Entity\Event e ORDER BY e.eventDate LIMIT 0,$max");
        // $lastEvents = $query->getResult();
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'e')
           ->add('from', 'Acseo\Bundle\StartupWeekendBundle\Entity\Event e')
           //->add('where', 'u.id = ?1')
           ->add('orderBy', 'e.eventDate DESC')
           //->limit(5);
           ->setMaxResults( $max );
        
        $query = $qb->getQuery();
        $lastEvents = $query->getResult();
        return array("lastEvents" => $lastEvents);   
    }
}
