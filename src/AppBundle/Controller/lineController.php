<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class lineController extends Controller
{
    public function lineGaleryAction (){
        return $this->render('line/line_galery.twig');
    }
}