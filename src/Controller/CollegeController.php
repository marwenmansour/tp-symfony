<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollegeController extends AbstractController
{
    /** 
    *@Route("/acceuil" ,name="index")
    */
    public function index(): Response
    {
        return $this->render('college/index.html.twig', [
            'controller_name' => 'CollegeController',
        ]);
    }

     /** 
    *@Route("/reglement_interieur" ,name="reglement")
    */
    public function reglement(): Response
    {
        return $this->render('college/reglement.html.twig', [
            'controller_name' => 'CollegeController',
        ]);
    }
}
