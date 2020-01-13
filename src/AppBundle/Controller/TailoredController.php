<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TailoredController extends Controller
{

    public function tailoredAction (){

        return $this->render('tailored/tailored.twig');
    }

    public function tailoreGaleryAction (){

        return $this->render('tailored/tailored_galery.twig');
    }
}