<?php

namespace Controller;

use Entity\Recipe;

class RecipeController
{
    public function create()
    {
        global $manager;
        if (isset($_SESSION['user']) && isset($_POST['title']) && isset($_POST['country']) && isset($_POST['category']) && isset($_POST['ingredients']) && isset($_POST['description']) && isset($_POST['imageUrl'])) {

            $errorMsg = NULL;

            if (strlen($_POST['title']) == 0) {
                $errorMsg = "Veuillez saisir un titre";
            } else if (strlen($_POST['country']) == 0) {
                $errorMsg = "Veuillez indiquer le pays";
            } else if (strlen($_POST['category']) == 0) {
                $errorMsg = "Veuillez indiquer la catégorie";
            } else if (strlen($_POST['ingredients']) == 0) {
                $errorMsg = "Veuillez saisir les ingrédients";
            } else if (strlen($_POST['description']) == 0) {
                $errorMsg = "Veuillez saisir une description";
            } else if (strlen($_POST['imageUrl']) == 0) {
                $errorMsg = "Veuillez indiquer l'url de l'illustration";
            }

            if ($errorMsg != NULL) {
                include "../templates/new.php";
            } else {
                $newRecipe = new Recipe();
                $newRecipe->title = $_POST['title'];
                $newRecipe->country = $_POST['country'];
                $newRecipe->category = $_POST['category'];
                $newRecipe->ingredients = $_POST['ingredients'];
                $newRecipe->description = $_POST['description'];
                $newRecipe->imageUrl = $_POST['imageUrl'];
                $newRecipe->creationDate = "Aujourd'hui";
                $newRecipe->creator = $_SESSION['user'];
                $manager->persist($newRecipe);
                $manager->flush();
                header('Location: display');
            }
        } else {
            include('../templates/new.php');
        }
    }
}
