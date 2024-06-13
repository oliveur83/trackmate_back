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
        $utilisateurs = $utilerepo->findByThemeId($id);
        $data = [];
        foreach ($utilisateurs as $utilisateurTheme) {
            $data[] = [
                'libelle' => $utilisateurTheme->getLibelle(),
                'x' => $utilisateurTheme->getX(),
                'y' => $utilisateurTheme->getY(),
                'id_ue' => $utilisateurTheme->getId(),
            ];
        }
        $jsonData = json_encode($data);
        $response = new Response($jsonData);
        return $response;

    }
    //----------------------
}