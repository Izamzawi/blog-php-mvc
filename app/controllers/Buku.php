<?php 

class Buku extends Controller{
    public function index(){
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->model('Buku_model')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('buku/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if( $this->model('Buku_model')->tambahBuku($_POST) > 0 ){

            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        } else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        }
    }

    public function delete($id){
        if( $this->model('Buku_model')->deleteBuku($id) > 0 ){

            Flasher::setFlash('berhasil', 'dihapus', 'success');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        } else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        }
    }

    public function getUpdate(){
        echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
    }

    public function update(){
        if( $this->model('Buku_model')->updateBuku($_POST) > 0 ){

            Flasher::setFlash('berhasil', 'diubah', 'success');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        } else{
            Flasher::setFlash('gagal', 'diubah', 'danger');

            header( 'Location: ' . BASEURL . '/buku' );
            exit;
        }
    }

}

?>