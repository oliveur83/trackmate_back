<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UeRepository;

use Symfony\Component\Routing\Annotation\Route;

class ue extends AbstractController
{

    /**
     * @Route("/select_uee/{id}", name="ue_select_id")
     */
    public function select_ue_id(ueRepository $utilerepo, $id): Response
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findByThemeId($id);
        var_dump($utilisateurs);
        // Construire un tableau associatif contenant les informations des utilisateurs

        // Créer une réponse JSON avec les informations des utilisateurs
        //$reponse = new JsonResponse($utilisateursJson);
        $reponse = new Response("<p> je mappele tom </p>");
        return $reponse;
    }

}