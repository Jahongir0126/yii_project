<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use models\LoginModel;
use models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // if ($request->isPost()) {
        //     $loginModel = new LoginModel();
        //     echo '<pre>';
        //     var_dump($request->getBody());
        //     echo '</pre>';
        //     exit;
        // }
        // $this->setLayout('auth');
        // return $this->render('login');
    }

    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());
            

            if ($user->validate() && $user->save()) {
                
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect("/");
                exit;
            }
            
            return $this->render("register", [
                'model' => $user
            ]);


        }
        
        $this->setLayout('auth');
        return $this->render("register", [
            'model' => $user
        ]);

    }
}