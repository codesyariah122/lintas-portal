<?php

namespace App\Controllers;

use Core\ControllerCore;

class NotFoundController extends ControllerCore {
	
    public function __construct()
    {
        $dataResponse = [
            "title" => "Err Page",
            "message" => "Page Not Found !!"
        ];
        $this->render('errors', $dataResponse);
    }

    public function index(){}

    public function all(){}

    public function create(){}

    public function update(){}

    public function delete(){}
}
