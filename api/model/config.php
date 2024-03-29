<?php

namespace Api\Model;
class config
{

    private string $servername = "localhost";
    private string $database = "oose";
    private string $username = "root";
    private string $password = "";
    private \PDO $db;

    //creates connection to database
    function __construct()
    {
        $dbh = new \PDO('mysql:host=' . $this->servername . ';dbname=' . $this->database . '', '' . $this->username . '', '' . $this->password . '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $dbh;
    }
//return the connection to the database
    public function getDb(){
        return $this->db;
    }
    
}
