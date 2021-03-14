<?php 

class Editor extends Controller{
    public function index(){
        $data['judul'] = 'Semua artikel';
        $this->view('templates/header', $data);
        $this->view('editor/index');
        $this->view('templates/footer');
    }

    public function detail(){
        $data['judul'] = 'Semua artikel';
        $this->view('templates/header', $data);
        $this->view('editor/detail');
        $this->view('templates/footer');
    }

    public function addNew(){
        $data['judul'] = 'Artikel Baru';
        $this->view('templates/header', $data);
        $this->view('editor/addNew');
        $this->view('templates/footer');
    }

    public function edit(){
        $data['judul'] = 'Edit artikel ini';
        $this->view('templates/header', $data);
        $this->view('editor/edit');
        $this->view('templates/footer');
    }

}


?>