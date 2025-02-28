<?php

namespace core;
use core\Response;
use core\Database;
/**
 * Class Appplication
 *       
 * @author jonidev 
 * @package core
 */
class Application
{
    public ?string $userClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public static Application $app;
    public ?Controller $controller =null;
    public ?DbModel $user = null;

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        // Добавляем проверку на существование пользователя
        $primaryValue = $this->session->get('user');
        if ($primaryValue && $this->userClass) {
            $primaryKey = $this->userClass::primaryKey();
            $user = $this->userClass::findOne([$primaryKey => $primaryValue]);
            // Присваиваем только если получили объект DbModel
            if ($user instanceof DbModel) {
                $this->user = $user;
            }
        }


    }
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error',[
                'exception'=>$e
            ]);
        }
    }



    public function getController(): \core\Controller
    {
        return $this->controller;
    }

    public function setController(\core\Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');

    }

    public  function isGuest(){
        return !self::$app->user;
    }


}
