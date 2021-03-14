<?php 

class Article extends Controller{
    public function index(){
        $data['judul'] = 'Artikel';
        $data['article'] = $this->model('Article_model')->getArticleAll();
        $this->view('templates/header', $data);
        $this->view('article/index', $data);
        $this->view('templates/footer');
    }

    public function detail($name){
        $data['article'] = $this->model('Article_model')->getArticleName($name);
        $this->view('templates/header_2', $data);
        $this->view('article/detail', $data);
        $this->view('templates/footer');
    }
}


?>