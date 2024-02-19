<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class carte extends AbstractController
{
    /**
     * @Route("/popo", name="appp_default", methods={"GET"})
     */
    public function index(): Response
    {
       $reponse= new Response("<p> je mappele tofdsfdsm </p>");

       return $reponse;
    } 
 

}
