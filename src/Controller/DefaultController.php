<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Entity\Utilisateur;
use App\Entity\UtilisateurTheme;
use App\Repository\QcmRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use App\Repository\ThemeRepository;
use App\Repository\UeRepository;
use App\Repository\UtilisateurThemeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reponse;
use App\Repository\UtilisateurRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default", methods={"GET"})
     */
    public function index(): Response
    {
        $reponse = new Response("<p> je mappele tom </p>");

        return $reponse;
    }
    /**
     * @Route("/select_util", name="selectutil_default")
     */
    public function select(UtilisateurRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'pseudo' => $utilisateur->getPseudo(),
                'password' => $utilisateur->getPassword(),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }
    /**
     * @Route("/select_theme", name="select_default")
     */
    public function select_theme(ThemeRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'libelle' => $utilisateur->getLibelle(),
                'id_theme' => $utilisateur->getId(),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }
    /**
     * @Route("/select_ue", name="ue_defaultt")
     */
    public function select_ue(ueRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'libellee' => $utilisateur->getLibelle(),
                'x' => $utilisateur->getX(),
                'y' => $utilisateur->getY(),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }
    /**
     * @Route("/select_QCM", name="qcm_default")
     */
    public function select_QCM(QcmRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'libelle' => $utilisateur->getLibelle(),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }/**
     * @Route("/select_question", name="question_default")
     */
    public function select_question(QuestionRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'libelle' => $utilisateur->getLibelle(),
                'num_question' => $utilisateur->getId()
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }/**
     * @Route("/select_reponse", name="reponse_default")
     */
    public function select_reponse(ReponseRepository $utilerepo): JsonResponse
    {
        // Récupérer tous les utilisateurs depuis le référentiel
        $utilisateurs = $utilerepo->findAll();

        // Construire un tableau associatif contenant les informations des utilisateurs
        $utilisateursArray = [];
        foreach ($utilisateurs as $utilisateur) {
            $utilisateursArray[] = [
                'libelle' => $utilisateur->getLibelle(),
                'nb_question' => $utilisateur->getIdQuestion(),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }

        // Convertir le tableau associatif en JSON
        $utilisateursJson = json_encode($utilisateursArray);

        // Créer une réponse JSON avec les informations des utilisateurs
        $reponse = new JsonResponse($utilisateursJson);

        return $reponse;
    }
    /**
     * @Route("/carte/{id}", name="carte_default")
     */
    public function carte(UtilisateurRepository $utilerepo, $id): Response
    {
        $util = $utilerepo->find($id);
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'id' => $id,
            'util' => $util
        ]);
    }
    /**
     * @Route("/ajouter", name="name_ajout")
     */
    public function ajouter(EntityManagerInterface $manager): Response
    {
        $utilisateur = new Reponse();
        $utilisateur->setLibelle("réponse14 ");
        $utilisateur->setIdQuestion(null);
        //dump($utilisateur);die;
        $manager->persist($utilisateur);
        $manager->flush();

        $reponse = new Response("<p> je mappele tom </p>");

        return $reponse;
    }

    /**
     * @Route("/ueutil/{userId}", name="ueutil")
     */
    public function ueutil(int $userId, UtilisateurThemeRepository $utilisateurThemeRepository): Response
    {
        $theme2 = $utilisateurThemeRepository->utilisateuridThemes($userId);
        $data = []; // Tableau pour stocker les données des thèmes

        foreach ($theme2 as $utilisateurTheme) {
            $utilisateur = $utilisateurTheme->getUtilisateur();
            $theme = $utilisateurTheme->getTheme();

            // Ajouter les informations de l'utilisateur et du thème au tableau
            $data[] = [
                'Utilisateur' => $utilisateur->getPseudo(),
                'Theme' => $theme->getLibelle(),
            ];
        }

        // Encodage des données en JSON
        $jsonData = json_encode($data);

        // Création de la réponse avec le contenu JSON
        $response = new Response($jsonData);


        return $response;
    }

    /**
     * @Route("/ajoutueutil", methods={"POST"})
     */
    public function traiterTableau(EntityManagerInterface $manager, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['id_theme']) || !isset($data['id_utilisateur'])) {
            return new JsonResponse(['error' => 'Paramètres manquants'], 400);
        }

        $utilisateur = $manager->getRepository(Utilisateur::class)->find($data['id_utilisateur']);
        $theme = $manager->getRepository(Theme::class)->find($data['id_theme']);

        if (!$utilisateur || !$theme) {
            return new JsonResponse(['error' => 'Utilisateur ou thème introuvable'], 404);
        }

        $utilisateurTheme = new UtilisateurTheme();
        $utilisateurTheme->setUtilisateur($utilisateur);
        $utilisateurTheme->setTheme($theme);
        $manager->persist($utilisateurTheme);
        $manager->flush();

        return new JsonResponse(['message' => 'Association utilisateur-thème ajoutée avec succès']);
    }

}