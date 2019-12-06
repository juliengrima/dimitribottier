<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Navigation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Navigation controller.
 *
 */
class NavigationController extends Controller
{
    /**
     * Lists all navigation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $navigations = $em->getRepository('AppBundle:Navigation')->findAll();

        return $this->render('navigation/index.html.twig', array(
            'navigations' => $navigations,
        ));
    }

    /**
     * Creates a new navigation entity.
     *
     */
    public function newAction(Request $request)
    {
        $navigation = new Navigation();
        $form = $this->createForm('AppBundle\Form\NavigationType', $navigation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /* KEEP PICTURE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            $navigation->setMedia ($image);

            if (isset($image)) {

                /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                $image->setName (preg_replace ('/\W/', '_', "image_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($navigation);
            $em->flush();

            return $this->redirectToRoute('navigation_show', array('id' => $navigation->getId()));
        }

        return $this->render('navigation/new.html.twig', array(
            'navigation' => $navigation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a navigation entity.
     *
     */
    public function showAction(Navigation $navigation)
    {
        $deleteForm = $this->createDeleteForm($navigation);

        return $this->render('navigation/show.html.twig', array(
            'navigation' => $navigation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing navigation entity.
     *
     */
    public function editAction(Request $request, Navigation $navigation)
    {
        $deleteForm = $this->createDeleteForm($navigation);
        $editForm = $this->createForm('AppBundle\Form\NavigationType', $navigation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /* KEEP PICTURE */
            $imageForm = $editForm->get ('media');
            $image = $imageForm->getData ();
            $navigation->setMedia ($image);

            if (isset($image)) {

                /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                $image->setName (preg_replace ('/\W/', '_', "image_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('navigation_show', array('id' => $navigation->getId()));
        }

        return $this->render('navigation/edit.html.twig', array(
            'navigation' => $navigation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a navigation entity.
     *
     */
    public function deleteAction(Request $request, Navigation $navigation)
    {
        $form = $this->createDeleteForm($navigation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($navigation);
            $em->flush();
        }

        return $this->redirectToRoute('navigation_index');
    }

    /**
     * Creates a form to delete a navigation entity.
     *
     * @param Navigation $navigation The navigation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Navigation $navigation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('navigation_delete', array('id' => $navigation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
