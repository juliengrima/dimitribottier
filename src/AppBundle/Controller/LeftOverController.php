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
        return $this->render('leftover/leftover_galery.twig');
    }
    public function leftOverGalery2Action (){
    return $this->render('leftover/leftover_galery2.twig');
    }
    public function leftOverGalery3Action (){
        return $this->render('leftover/leftover_galery3.twig');
    }
}