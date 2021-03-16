<?php 

class Post_model{
    private $table = 'posts';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get all post from database
    public function getPostAll(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    // Get requested post by article name
    public function getPostbySlug($slug){
        $query = "SELECT * FROM ' . $this->table . ' WHERE slug=:slug";
        
        $this->db->query($query);
        $this->db->bind( 'slug', $slug );
        
        return $this->db->single();
    }

    // Add new post
    public function addPost($data){
        $query = "INSERT INTO ' . $this->table . ' VALUES('', :title, :slug, :content)";

        $this->db->query($query);
        $this->db->bind( 'title', $data['title'] );
        $this->db->bind( 'slug', $data['slug'] );
        $this->db->bind( 'content', $data['content'] );

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Edit an existing post
    public function updatePost($data){
        $query = "UPDATE ' . $this->table . ' SET title = :title, content = :content WHERE id = :id";

        $this->db->query($query);
        $this->db->bind( 'id', $data['id'] );
        $this->db->bind( 'title', $data['title'] );
        $this->db->bind( 'slug', $data['slug'] );
        $this->db->bind( 'content', $data['content'] );

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Delete an existing post
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');

        $this->db->bind( 'id', $id );

        $this->db->execute();

        return $this->db->rowCount();
    }

}
?>