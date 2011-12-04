<?php

namespace Acseo\Bundle\StartupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acseo\Bundle\StartupBundle\Entity\Comment;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query;

/**
 * Comment controller.
 *
 * @Route("/comment")
 */
class CommentController extends Controller
{
    /**
     * Lists all Comment entities.
     *
     * @Route("/", name="comment")
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
     * @Route("/{id}/show", name="comment_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AcseoStartupBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
    /**
     * Finds and displays lastComments
     *
     * @Route("/lastComments/{max}", name="comment_last")
     * @Template()
     */
    public function lastCommentsAction($max)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->add('select', 'c')
           ->add('from', 'Acseo\Bundle\StartupBundle\Entity\Comment c')
           ->add('orderBy', 'c.date DESC')
           ->setMaxResults( $max );
        
        $query = $qb->getQuery();
        $lastComments = $query->getResult(Query::HYDRATE_OBJECT);
        return array("lastComments" => $lastComments);   
    }
}
