<?php 

/* Database class
   Configure which database will be used
   Using PDO
*/
class Database{
    private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbhand;
    private $stmt;
    // private $error;

    // Set database connection
    public function __construct(){
        $conn = 'mysql:host=' . $this->dbhost . '; dbname=' . $this->dbname;

        $option=[
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbhand = new PDO($conn, $this->dbuser, $this->dbpass, $option);
        } catch( PDOException $e ){
            die( $e->getMessage() );
        }  
    }

    // Prepare the statement
    public function query($query){
        $this->stmt = $this->dbhand->prepare($query);
    }

    // Bind values
    public function bind( $param, $value, $type = null ){
        if( is_null($type) ){
            switch( true ){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_int($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the statement
    public function execute(){
        $this->stmt->execute();
    }

    // Return result as an array
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    // Return a single result
    public function single(){
        $this->execute();
        return $this->stmt->fetch( PDO::FETCH_ASSOC );
    }
    
    // Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}

?>