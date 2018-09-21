<?php

class UserView extends View
{
    public $template = 'main';
    public $user;

    public function __construct(array $user)
    {
        $this->user = $user;
        parent::__construct();
    }

    public function init()
    {
        return [
            'user_name' => $this->user['name'],
        ];
    }
}
