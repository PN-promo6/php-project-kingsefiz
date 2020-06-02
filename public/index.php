<?php

use Entity\Recipe;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$userRepo = $orm->getRepository(User::class);
$manager = $orm->getManager();

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        break;
    case 'logout':
        break;
    case 'login':
        break;
    case 'new':
        break;
    case 'display':
    default:
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
        break;
}
