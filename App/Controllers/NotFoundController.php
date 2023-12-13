<?php

namespace App\Controllers;

use Core\ControllerCore;

class NotFoundController extends ControllerCore
{

    public function __construct()
    {
        $dataResponse = [
            "title" => "Err Page",
            "message" => "Page Not Found !!",
            "contents" => []
        ];
        $this->render('errors', 'Layouts/DefaultLayout', $dataResponse);
    }

    public function index()
    {
    }

    public function all()
    {
    }

    public function create()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
