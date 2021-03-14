<?php 

class Buku_model{
    private $table = 'buku';
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBuku(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBukuById($id){
        $this->db->query( 'SELECT * FROM ' . $this->table . ' WHERE id=:id' );
        $this->db->bind( 'id', $id );
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

    public function deleteBuku($id){
        $query = "DELETE FROM buku WHERE ID=:id";
        $this->db->query($query);
        $this->db->bind( 'id', $id );

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function updateBuku($data){
        $query = "UPDATE buku SET
                judul = :judul,
                pengarang = :pengarang,
                penerbit = :penerbit,
                tahun = :tahun
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind( 'id', $data['id'] );
        $this->db->bind( 'judul', $data['judul'] );
        $this->db->bind( 'pengarang', $data['pengarang'] );
        $this->db->bind( 'penerbit', $data['penerbit'] );
        $this->db->bind( 'tahun', $data['tahun'] );

        $this->db->execute();

        return $this->db->rowCount();
    }

}
?>