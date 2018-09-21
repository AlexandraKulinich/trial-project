<?php

class App
{
    public $config;

    public $isGuest = true;

    public function __construct(array $config = [])
    {
        session_start();
        $this->config = $config;
        $this->isGuest();
    }

    public function run()
    {
        $path =  $this->getPath();

        $action = '';
        if (isset($path[1])) {
            $action = $path[1];
        }

        if (isset($_POST['action'])) {
            header("Location: http://localhost:8888/{$_POST['action']}");
        }

        if (!$action && !$this->isGuest) {
            header("Location: http://localhost:8888/user");
        }

        $view = $this->getView($action);

        $view->run();
    }

    public function getPath()
    {
        return explode('/', rtrim($_SERVER['PATH_INFO']));
    }

    public function getView($actionName)
    {
        $controller = $this->getController($actionName);

        if ($controller instanceof ErrorController) {
            return $controller->error();
        }

        if (!$actionName) {
            $actionName = 'index';
        }

        return $controller->$actionName();
    }

    public function getController($actionName)
    {
        $controller = '';
        foreach ($this->config['router'] as $key => $value) {
            if ($key === $actionName) {
                $class = $value['class'];
                $controller = (new $class($this->config));
            }
        }

        if (!$this->validateController($controller)) {
            $controller = (new ErrorController($this->config));
            $controller->errorMessage = 'page not found';
            return $controller;
        }

        return $controller;
    }

    public function validateController($controller): bool
    {
        if (!$controller) {
            return false;
        }

        if (!$controller instanceof Controller) {
            return false;
        }

        return true;
    }

    public function isGuest()
    {
        if (isset($_SESSION['login'])) {
            $this->isGuest = false;
        }
    }
}