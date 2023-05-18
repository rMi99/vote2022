<?php 

class Database {
    public $connection = NULL;
    public $host = NULL;
    public $user = NULL;
    public $password = NULL;
    public $port = NULL;
    
    function __construct($hname, $uname, $pwd, $port){
        $this->host = $hname;
        $this->user = $uname;
        $this->password = $pwd;
        $this->port = $port;
    }
    
    function initConnection() {
        try{
            $this->connection = new \PDO("mysql:host=$this->host;dbname=user_data;", $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return "Connection created successfully!!!";
        } catch(\PDOException $pdoEx){
            return "ERROR : " . $pdoEx->getMessage();
        }
    }
    
    function getConnection(){
        if($this->connection != NULL)
            return $this->connection;
        return NULL;
    }
}

?>