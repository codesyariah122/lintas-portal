<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return render view
**/

namespace Core;

class View implements ViewInterface {
    public function render($viewName, $data = []) {
        extract($data);
        require_once 'views/' . $viewName . '.php';
    }
}
