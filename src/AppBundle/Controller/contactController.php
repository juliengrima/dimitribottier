<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class contactController extends Controller
{
    public function contactAction (){

        return $this->render('contact/contact.twig');
    }

    public function noticeAction (){

        return $this->render('default/notice.twig');
    }
}