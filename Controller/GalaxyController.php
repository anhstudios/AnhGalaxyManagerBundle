<?php

namespace Anh\GalaxyManagerBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Anh\GalaxyManagerBundle\Entity\Galaxy;
use Anh\GalaxyManagerBundle\Form\GalaxyType;

/**
 * Galaxy controller.
 *
 * @Route("/galaxy")
 */
class GalaxyController extends Controller
{
    /**
     * Lists all Galaxy entities.
     *
     * @Route("/", name="galaxy")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AnhGalaxyManagerBundle:Galaxy')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Galaxy entity.
     *
     * @Route("/{id}/show", name="galaxy_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AnhGalaxyManagerBundle:Galaxy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galaxy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Galaxy entity.
     *
     * @Route("/new", name="galaxy_new")
     * @Template()
     */
    public function newAction()
    {
        if (false === $this->securityContext->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        $entity = new Galaxy();
        $form   = $this->createForm(new GalaxyType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Galaxy entity.
     *
     * @Route("/create", name="galaxy_create")
     * @Method("post")
     * @Template("AnhGalaxyManagerBundle:Galaxy:new.html.twig")
     */
    public function createAction()
    {
        if (false === $this->securityContext->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
        
        $entity  = new Galaxy();
        $request = $this->getRequest();
        $form    = $this->createForm(new GalaxyType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('galaxy_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Galaxy entity.
     *
     * @Route("/{id}/edit", name="galaxy_edit")
     * @Template()
     */
    public function editAction($id)
    {
        if (false === $this->securityContext->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AnhGalaxyManagerBundle:Galaxy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galaxy entity.');
        }

        $editForm = $this->createForm(new GalaxyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Galaxy entity.
     *
     * @Route("/{id}/update", name="galaxy_update")
     * @Method("post")
     * @Template("AnhGalaxyManagerBundle:Galaxy:edit.html.twig")
     */
    public function updateAction($id)
    {
        if (false === $this->securityContext->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AnhGalaxyManagerBundle:Galaxy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galaxy entity.');
        }

        $editForm   = $this->createForm(new GalaxyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('galaxy_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Galaxy entity.
     *
     * @Route("/{id}/delete", name="galaxy_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        if (false === $this->securityContext->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
        
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AnhGalaxyManagerBundle:Galaxy')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Galaxy entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('galaxy'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
