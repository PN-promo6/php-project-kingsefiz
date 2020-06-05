<?php

namespace Controller;

use Entity\Recipe;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class RecipeController extends AbstractController
{
    public function create(Request $request): Response
    {
        $manager = $this->getOrm()->getManager();
        if (($request->getSession()->has('user')) && $request->request->has('title') && $request->request->has('country') && $request->request->has('category') && $request->request->has('ingredients') && $request->request->has('description') && $request->request->has('imageUrl')) {

            $errorMsg = NULL;

            if (strlen($request->request->get('title')) == 0) {
                $errorMsg = "Veuillez saisir un titre";
            } else if (strlen($request->request->get('country')) == 0) {
                $errorMsg = "Veuillez indiquer le pays";
            } else if (strlen($request->request->get('category')) == 0) {
                $errorMsg = "Veuillez indiquer la catégorie";
            } else if (strlen($request->request->get('ingredients')) == 0) {
                $errorMsg = "Veuillez saisir les ingrédients";
            } else if (strlen($request->request->get('description')) == 0) {
                $errorMsg = "Veuillez saisir une description";
            } else if (strlen($request->request->get('imageUrl')) == 0) {
                $errorMsg = "Veuillez indiquer l'url de l'illustration";
            }

            if ($errorMsg != NULL) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render('new.php', $data);
            } else {
                $newRecipe = new Recipe();
                $newRecipe->title = ($request->request->has('title'));
                $newRecipe->country = $request->request->get('country');
                $newRecipe->category = $request->request->get('category');
                $newRecipe->ingredients = $request->request->get('ingredients');
                $newRecipe->description = $request->request->get('description');
                $newRecipe->imageUrl = $request->request->get('imageUrl');
                $newRecipe->creationDate = "Aujourd'hui";
                $newRecipe->creator = $request->getSession()->get('user');
                $manager->persist($newRecipe);
                $manager->flush();
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('new.php');
        }
    }
}
