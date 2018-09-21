<?php

class ErrorController extends Controller
{
    public function error()
    {
        return (new ErrorView($this->errorMessage));
    }
}