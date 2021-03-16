<?php 

class Home extends Controller{
    public function index(){
        $data['page'] = 'Home';
        $data['posts'] = $this->model('Post_model')->getPostAll();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }    
}



?>