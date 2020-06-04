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
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {
            $errorMsg = NULL;
            $matchingNickname = $userRepo->findBy(array("nickname" => $_POST['username']));
            if (count($matchingNickname > 0)) {
                $errorMsg = "Le pseudo est déjà utilisé !";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../views/register.php";
            } else {
                $user = new User();
                $user->nickname = $_POST['username'];
                $user->password = $_POST['password'];
                $manager->persist($user);
                $manager->flush();
                $_SESSION['user'] = $user;
                header('Location: ?action=display');
            }
        } else {
            include "../views/register.php";
        }
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("nickname" => $_POST['username']));
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
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: ?action=display');
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
