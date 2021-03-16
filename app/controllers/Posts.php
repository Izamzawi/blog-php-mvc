<?php 

class Posts extends Controller{
    public function __construct() {
        $this->postModel = $this->model('Post_model');
    }

    // Default view, show all posts
    public function index(){
        $data['page'] = 'All Posts';
        $data['posts'] = $this->postModel->getPostAll();
        $this->view('templates/header', $data);
        $this->view('posts/index', $data);
        $this->view('templates/footer');
    }

    // Show a specific post
    public function read($name){
        $post = $this->postModel->getPostbyName($name);

        $data['page'] = $post['title'];
        $data['posts'] = $post;
        $this->view('templates/header', $data);
        $this->view('posts/read', $data);
        $this->view('templates/footer');
    }

    // Method for creating a new post
    public function addnew(){
        // Check for user's session
        if(!isLoggedIn()) {
            header("Location: " . BASEURL . "/posts");
        }

        $data = [
            'page' => 'Write your new post',
            'title' => '',
            'content' => '',
            'titleError' => '',
            'contentError' => ''
        ];

        // Receive post's data
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'content' => $_POST['content'],
                'titleError' => '',
                'contentError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['content'])) {
                $data['contentError'] = 'The content of a post cannot be empty';
            }

            // No error from data checking
            if(empty($data['titleError']) && empty($data['contentError'])){
                if($this->postModel->addPost($data)){
                    header("Location: " . BASEURL . "/posts");
                } else{
                    die("Something went wrong, please try again!");
                }
            } else{
                $this->view('posts/addnew', $data);
            }
        }

        $this->view('templates/header', $data);
        $this->view('posts/addnew', $data);
        $this->view('templates/footer');
    }

    // Edit the content of an existing post
    public function edit($id){
        $post = $this->postModel->findPostById($id);

        // Check for user's session
        if(!isLoggedIn()){
            header("Location: " . BASEURL . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . BASEURL . "/posts");
        }

        $data = [
            'page' => 'Edit this post',
            'post' => $post,
            'title' => '',
            'content' => '',
            'titleError' => '',
            'contentError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'post' => $post,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'content' => $_POST['content'],
                'titleError' => '',
                'contentError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['content'])) {
                $data['contentError'] = 'The content of a post cannot be empty';
            }

            // Check for no error
            if(empty($data['titleError']) && empty($data['bodyError'])){
                if($this->postModel->updatePost($data) > -1){
                    header("Location: " . BASEURL . "/posts");
                } else{
                    die("Something went wrong, please try again!");
                }
            } else{
                $this->view('posts/edit', $data);
            }
        }

        $this->view('templates/header', $data);
        $this->view('posts/edit', $data);
        $this->view('templates/footer');
    }

    public function delete($id) {
        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . BASEURL . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . BASEURL . "/posts");
        }

        $data = [
            'post' => $post,
            'id' => $id,
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->postModel->deletePost($id)) {
                header("Location: " . BASEURL . "/posts");
            } else {
                die('Something went wrong!');
            }
        }
    }

}

?>