<?php
class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {

        extract($data);
        
        $viewContent = $view;
        
        if (file_exists('../app/views/layoutmaster.php')) {
            require_once '../app/views/layoutmaster.php';
        } else {
            require_once '../app/views/' . $view . '.php';
        }
    }
}