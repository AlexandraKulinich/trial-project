<?php

class Controller
{
    public $storage = [];
    public $errorMessage = '';

    public function __construct(array $config)
    {
        $this->storage = $config['storage'];
    }

    public function index()
    {
        return (new IndexView());
    }

    public function getUser()
    {
        $user = null;
        $login = $_SESSION['login'] ?? null;
        foreach ($this->storage as $item) {
            if ($item['login'] == $login) {
                $user = $item;
            }
        }

        return $user;
    }
}