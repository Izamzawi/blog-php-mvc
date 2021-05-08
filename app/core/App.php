<?php 

/* App class, set default controller and method
   Load accessed controller and method
   URL Format = controller/method/params

*/
class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        // Take first section of URL as controller
        if(!isset($url[0])){
            $url[0] = $this->controller;
        }

        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        // Load the accessed controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
    
        // Take second section of URL as method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Get any params sent on URL, 3rd section of URL and later
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // Run controller & method, send any params if available
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Format the URL as 3 section
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            return $url;
        }
    }
  
}

?>