<?php

class UserController extends Controller
{
    public function __construct(array $config)
    {
        return parent::__construct($config);
    }

    public function user()
    {
        return (new UserView($this->getUser()));
    }
}
