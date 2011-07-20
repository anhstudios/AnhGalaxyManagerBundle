<?php

namespace Anh\GalaxyManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Anh\GalaxyManagerBundle\Entity\Service;
use Anh\GalaxyManagerBundle\Form\ServiceType;

/**
 * Service controller.
 *
 * @Route("/service")
 */
class ServiceController extends Controller
{
    /**
     * Lists all Service entities.
     *
     * @Route("/", name="service")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AnhGalaxyManagerBundle:Service')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Service entity.
     *
     * @Route("/{id}/show", name="service_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AnhGalaxyManagerBundle:Service')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Service entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

}
