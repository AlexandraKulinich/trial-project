<?php

class ErrorView extends View
{
    public $message;

    public $template = 'error';

    public function __construct(string $message = '')
    {
        $this->message = $message;
        parent::__construct();
    }

    public function init()
    {
        return [
            'error' => $this->message,
        ];
    }
}