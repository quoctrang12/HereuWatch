<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller
{
    public $redirect = '/home';
    public $view;
    public function __construct()
    {
        $this->init();

        if (!$this->authorize()) {
            redirect($this->redirect);
        }
    }
    public function authorize()
    {
        return true;
    }
    public function init()
    {
        $this->view = new Engine(config('view.path'));
    }

    public function sendPage($page, array $data = [])
    {
        exit($this->view->render($page, $data));
    }
}
