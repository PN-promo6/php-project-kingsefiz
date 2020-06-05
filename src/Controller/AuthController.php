<?php

namespace Controller;

use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{
    public function login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);

        if ($request->request->has('username') && $request->request->has('password')) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $request->request->get('username')));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($request->request->get('password'))) {
                    $errorMsg = "Mot de passe incorrect";
                    $data = array(
                        "errorMsg" => $errorMsg
                    );
                    return $this->render('login.php', $data);
                } else {
                    $request->getSession()->set('user', $usersWithThisLogin[0]);
                    return $this->redirectToRoute('display');
                }
            } else {
                $errorMsg = "Nickname doesn't exist.";
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render('login.php', $data);
            }
        } else {
            return $this->render('login.php');
        }
    }

    public function logout(Request $request): Response
    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();

        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('confirmPass')) {
            $errorMsg = NULL;
            $matchingUsername = $userRepo->findBy(array("username" => $request->request->get('username')));

            if (count($matchingUsername) > 0) {
                $errorMsg = "Le pseudo est déjà utilisé !";
            } else if ($request->request->get('password') != $request->request->get('confirmPass')) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($request->request->get('password'))) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($request->request->get('password'))) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render('register.php', $data);
            } else {
                $user = new User();
                $user->username = $request->request->get('username');
                $user->password = $_POST['password'];
                $manager->persist($user);
                $manager->flush();
                $request->getSession()->set('user', $user);
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('register.php');
        }
    }
}
