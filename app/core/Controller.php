<?php 

// Function used to load the views and models requested
class Controller{
    public function view($view, $data = []){
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("Page requested not found.");
        }
}

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}

?>