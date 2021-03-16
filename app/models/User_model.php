<?php

class User_model {
    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register a new user to access posts
    public function register($data){
        $query = "INSERT INTO ' . $this->table . ' (username, email, password) VALUES(:username, :email, :password)";

        $this->db->query($query);
        $this->db->bind( 'username', $data['username'] );
        $this->db->bind( 'email', $data['email'] );
        $this->db->bind( 'password', $data['password'] );

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Retrieve and verify user login
    public function signin($username, $password){
        $query = ("SELECT * FROM ' . $this->table . ' WHERE username = :username");

        $this->db->query($query);
        $this->db->bind( 'username', $username );

        $result = $this->db->single();

        $hashedPassword = $result->password;

        if(password_verify($password, $hashedPassword)) {
            return $result;
        } else{
            return false;
        }
    }

    // Check if email already used by another registered user
    public function findUserByEmail($email){
        $query = "SELECT * FROM users WHERE email = :email";

        $this->db->query($query);
        $this->db->bind( 'email', $email );

        if($this->db->rowCount() > 0) {
            return true;
        } else{
            return false;
        }
    }
}
