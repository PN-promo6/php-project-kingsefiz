<?php

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\HomeController;
use Controller\RecipeController;

require __DIR__ . '/../vendor/autoload.php';
session_start();
$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$userRepo = $orm->getRepository(User::class);
$manager = $orm->getManager();

$action = $_GET["action"] ?? "display";

switch ($action) {
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'new':
        $controller = new RecipeController();
        $controller->create();
        break;

    case 'display':
    default:
        $controller = new HomeController();
        $controller->display();
        break;
}
