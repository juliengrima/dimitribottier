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
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    public function actualityAction (){

        return $this->render('actuality/actuality.twig');
    }

    public function seasonAction (){

        return $this->render('actuality/season.twig');
    }

    public function nCreationAction (){

        return $this->render('actuality/ncreation.twig');
    }

    public function pCeationAction (){

        return $this->render('actuality/pcreation.twig');
    }

    public function exoticAction (){

        return $this->render('actuality/exotic.twig');
    }

    public function inspirationAction (){

        return $this->render('actuality/inspiration.twig');
    }

    public function leatherworkAction (){

        return $this->render('actuality/leatherwork.twig');
    }

}
