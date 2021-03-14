<?php 

class About extends Controller{
    public function index(){
        $data['judul'] = 'About me';
        $this->view('templates/header', $data);
        $this->view('about/index');
        $this->view('templates/footer');
    }
}


?>