<?php

namespace Controller;

use Entity\User;
use Entity\Recipe;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $recipeRepo = $this->getOrm()->getRepository(Recipe::class);

        $item = $recipeRepo->find(1);
        $items = array();
        if (($request->query->has('top-search'))) {
            $strToSearch = $request->query->get('top-search');;
            if (strpos($strToSearch, "@") === 0) {
                $userName = substr($strToSearch, 1);
                $users = $userRepo->findBy(array("username" => $userName));
                if (count($users) == 1) {
                    $items = $recipeRepo->findBy(array("creator" => $users[0]->id));
                }
            } else {
                $items = $recipeRepo->findBy(array("description" => $strToSearch));
            }
        } else {
            $items = $recipeRepo->findAll();
        }
        $data = array(
            "items" => $items
        );
        return $this->render('display.php', $data);
    }
}
