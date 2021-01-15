<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Medium controller.
 *
 */
class MediaController extends Controller
{
    /**
     * Lists all medium entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $media = $em->getRepository('AppBundle:Media')->findAll();

        return $this->render('media/index.html.twig', array(
            'media' => $media,
        ));
    }

    /**
     * Creates a new medium entity.
     *
     */
    public function newAction(Request $request)
    {
        $media = new Media();
        $form = $this->createForm('AppBundle\Form\Media', $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();

            if (isset($image)){
                /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                $image->setMediaName (preg_replace ('/\W/', '_', "picture_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);

            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($media);
            $em->flush();

            return $this->redirectToRoute('media_index');
        }

        return $this->render('media/new.html.twig', array(
            'media' => $media,
            'form' => $form->createView(),
        ));
    }

//    /**
//     * Finds and displays a medium entity.
//     *
//     */
//    public function showAction(Media $media)
//    {
//        $deleteForm = $this->createDeleteForm($media);
//
//        return $this->render('media/show.html.twig', array(
//            'medium' => $media,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }

    /**
     * Displays a form to edit an existing media entity.
     *
     */
    public function editAction(Request $request, Media $media)
    {
        $deleteForm = $this->createDeleteForm($media);
        $editForm = $this->createForm('AppBundle\Form\Media', $media);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_edit', array('id' => $media->getId()));
        }

        return $this->render('media/edit.html.twig', array(
            'medium' => $media,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a media entity.
     *
     */
    public function deleteAction(Request $request, Media $media)
    {
        $form = $this->createDeleteForm($media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($media);
            $em->flush();
        }

        return $this->redirectToRoute('media_index');
    }

    /**
     * Creates a form to delete a medium entity.
     *
     * @param Media $media The medium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Media $media)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('media_delete', array('id' => $media->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}