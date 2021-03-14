<?php 

class Article_model{
    private $table = 'article';
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function getArticleAll(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getArticleName($name){
        $this->db->query( 'SELECT * FROM ' . $this->table . ' WHERE name=:name' );
        $this->db->bind( 'name', $name );
        
        return $this->db->single();
    }

    public function tambahBuku($data){
        $query = "INSERT INTO buku VALUES
                ('', :judul, :pengarang, :penerbit, :tahun)";

        $this->db->query($query);
        $this->db->bind( 'judul', $data['judul'] );
        $this->db->bind( 'pengarang', $data['pengarang'] );
        $this->db->bind( 'penerbit', $data['penerbit'] );
        $this->db->bind( 'tahun', $data['tahun'] );

        $this->db->execute();

        return $this->db->rowCount();

    }

    


}
?>