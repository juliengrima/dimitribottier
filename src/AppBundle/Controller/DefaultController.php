<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        $em = $this->getDoctrine ()->getManager ();
        $navigation = $em->getRepository ('AppBundle:Navigation')->findAll ();
        return $this->render('default/index.html.twig', array(
            'navigations' => $navigation
        ));
    }

    public function panelAction(Request $request)
    {
        return $this->render('admin/panel.html.twig');
    }
}
