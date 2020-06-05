<?php

use Entity\Recipe;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
session_start();
$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$userRepo = $orm->getRepository(User::class);
$manager = $orm->getManager();

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {
            $errorMsg = NULL;
            $matchingUsername = $userRepo->findBy(array("username" => $_POST['username']));

            if (count($matchingUsername) > 0) {
                $errorMsg = "Le pseudo est déjà utilisé !";
            } else if ($_POST['password'] != $_POST['confirmPass']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/register.php";
            } else {
                $user = new User();
                $user->username = $_POST['username'];
                $user->password = $_POST['password'];
                $manager->persist($user);
                $manager->flush();
                $_SESSION['user'] = $user;
                header('Location: ?action=display');
            }
        } else {
            include "../templates/register.php";
        }
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/login.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0];
                    header('Location:/?action=display');
                }
            } else {
                $errorMsg = "Nickname doesn't exist.";
                include "../templates/login.php";
            }
        } else {
            include "../templates/login.php";
        }
        break;

    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
        break;

    case 'new':

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
                header('Location: ?action=display.php');
            }
        } else {
            include('../templates/new.php');
        }
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
