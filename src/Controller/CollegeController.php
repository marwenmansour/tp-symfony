<?php

namespace App\Controller;

use App\Entity\Prof;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    /**
     * @Route("/professeur/{id}/delete", name="delete_professeur")
     */
    public function delete(Prof $professeur, EntityManagerInterface $entityManager) {
        /**
         * On demande à Symfony de nous 
         * récupérer automatiquement un produit
         * 
         * Il va tenter de la faire grâce à l'injection de dépendance
         * 
         * Pour trouver le bon produit, 
         * il va prendre le premier paramètre d'URL
         * et le considérer comme la clef primaire 
         * qui permet de retrouver le produit en question
         */

        /**
         * L'entity Manager nous sert 
         * à MODIFIER, CREER, SUPPRIMER des entités
         * 
         * On l'injecte grâce à l'injection de dépendance
         */

        // dd($produit); // dump & die

        $entityManager->remove($professeur); // On ajoute le delete à la TODO-list
        $entityManager->flush(); // On exécute la TODO-list

        return $this->redirectToRoute('acceuil');
    }
}
