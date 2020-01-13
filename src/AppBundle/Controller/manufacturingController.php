<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class manufacturingController extends Controller
{
    public function manufacturingAction (){
        return $this->render('manufacturing/manufacturing.twig');
    }

    public function manufacturingGaleryAction (){
        return $this->render('manufacturing/manufacturing_galery.twig');
    }
}