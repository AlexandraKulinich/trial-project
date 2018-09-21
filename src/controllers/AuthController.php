<?php

class AuthController extends Controller
{
    public function __construct(array $config)
    {
        return parent::__construct($config);
    }

    public function login()
    {
        if ($this->getUser()) {
            header("Location: http://localhost:8888/");
        }

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $userKey = 0;
            foreach ($this->storage as $key => $value) {
                if ($_POST['login'] == $value['login']) {
                    $userKey = $key;
                }
            }

            if (!$userKey) {
                return (new ErrorView('Неверный логин'));
            }

            if ($_POST['password'] !== $this->storage[$userKey]['password']) {
                return (new ErrorView('Неверный пароль'));
            }

            $_SESSION['login'] = $this->storage[$userKey]['login'];
            $_SESSION['password'] = $this->storage[$userKey]['password'];
            $_SESSION['user'] = $userKey;
            header("Location: http://localhost:8888");

        } else {

            return (new LoginView());

        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: http://localhost:8888/");
    }
}