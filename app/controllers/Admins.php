<?php

class Admins extends Controller {
    public function __construct(){
        $this->adminModel = $this->model('Admin_model');
    }

    // Enable to add new admin
    public function register(){
        $data = [
            'page' => 'Register New Admin',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        // Receive data from a new register process
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            // Validate username on letters/numbers
            if(empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif(!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            // Validate email
            if(empty($data['email'])){
                $data['emailError'] = 'Please enter email address.';
            } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else{
                //Check if email exists.
                if ($this->adminModel->findAdminByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

            // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 7){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordError'] = 'Please enter password.';
            } else{
                if($data['password'] != $data['confirmPassword']){
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if(empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register admin from model function
                if($this->adminModel->register($data)){
                    // Redirect to the login page
                    header('location: ' . BASEURL . '/admins/signin');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $this->view('templates/header', $data);
        $this->view('admin/register', $data);
        $this->view('templates/footer');
    }

    public function signin(){
        $data = [
            'page' => 'Register New Admin',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        // Check for POST method
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            // Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            // Check if no errors occured
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInAdmin = $this->adminModel->signin($data['username'], $data['password']);

                if ($loggedInAdmin) {
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    // $this->view('admin/signin', $data);
                }
            }

        } else{
            $data = [
                'page' => 'Register New Admin',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }

        $this->view('templates/header', $data);
        $this->view('admin/signin', $data);
        $this->view('templates/footer');
    }

    // Create a session for logged admin
    public function createAdminSession($admin){
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['email'] = $admin['email'];
        header( 'location:' . BASEURL . '/home' );
    }

    // Clear session after logout
    public function signout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header( 'location:' . BASEURL . '/home' );
    }
}
