<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use core\Response;
use models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "The JoniDev"
        ];
        return $this->render('home', $params);
    }

     
    public function contact(Request $request, Response $response)
    {
        $contact =new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success','Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact',[
            'model'=> $contact
        ]);
    }


}