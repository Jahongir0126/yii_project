<?php

namespace core\middlewares;
use core\Application;
use core\exception\ForbiddenException;
use core\middlewares\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{

    public array $actions;
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }
    public function execute()
    {
        if (Application::$app->isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                
                throw new ForbiddenException();
            }
        }
    }
}