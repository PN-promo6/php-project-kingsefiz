<?php

namespace Controller;

class HomeController
{
    public function display()
    {
        global $userRepo;
        global $recipeRepo;

        $item = $recipeRepo->find(1);
        $items = array();
        if (isset($_GET['top-search'])) {
            $strToSearch = $_GET['top-search'];
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

        include "../templates/display.php";
    }
}
