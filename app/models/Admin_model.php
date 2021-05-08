<?php

class Admin_model {
    private $table = 'admins';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register a new admin to access posts
    public function register($data){
        $query = 'INSERT INTO ' . $this->table . ' (username, email, password) VALUES(:username, :email, :password)';

        $this->db->query($query);
        $this->db->bind( 'username', $data['username'] );
        $this->db->bind( 'email', $data['email'] );
        $this->db->bind( 'password', $data['password'] );

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Retrieve and verify admin login
    public function signin($username, $password){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');

        $this->db->bind( 'username', $username );

        $row = $this->db->single();

        // Assign stored hashed password to a variable for password verify
        $hashedPassword = $row['password'];

        if(password_verify($password, $hashedPassword)) {
            return $row;
        } else{
            return false;
        }
    }

    // Check if email already used by another registered admin
    public function findAdminByEmail($email){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';

        $this->db->query($query);
        $this->db->bind( 'email', $email );

        if($this->db->rowCount() > 0) {
            return true;
        } else{
            return false;
        }
    }
}

?>