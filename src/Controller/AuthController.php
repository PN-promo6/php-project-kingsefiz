<?php

namespace Controller;

use Entity\User;

class AuthController
{
    public function login()
    {
        global $userRepo;

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/login.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0];
                    header('Location:/display');
                }
            } else {
                $errorMsg = "Nickname doesn't exist.";
                include "../templates/login.php";
            }
        } else {
            include "../templates/login.php";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: display');
    }

    public function register()
    {
        global $userRepo;
        global $manager;
        global $recipeRepo;

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
                header('Location: display');
            }
        } else {
            include "../templates/register.php";
        }
    }
}
