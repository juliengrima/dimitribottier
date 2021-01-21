<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LeftOverController extends Controller
{
    public function leftOverAction (){
        return $this->render('leftover/leftover.twig');
    }
    public function leftOverGalery1Action (){
        $em = $this->getDoctrine()->getManager();
        $media = $em->getRepository('AppBundle:Media')->findBy(array('page' => "escarpin"));
        return $this->render('leftover/leftover_galery.twig', array(
            'medias' => $media,
        ));
    }
    public function leftOverGalery2Action (){
        $em = $this->getDoctrine()->getManager();
        $media = $em->getRepository('AppBundle:Media')->findBy(array('page' => "richelieu"));
        return $this->render('leftover/leftover_galery2.twig', array(
            'medias' => $media,
        ));
    }
    public function leftOverGalery3Action (){
        $em = $this->getDoctrine()->getManager();
        $media = $em->getRepository('AppBundle:Media')->findBy(array('page' => "chukka"));
        return $this->render('leftover/leftover_galery3.twig', array(
            'medias' => $media,
        ));
    }
}