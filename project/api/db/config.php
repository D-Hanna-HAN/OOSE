<?php

class config
{

    private string $servername = "localhost";
    private string $database = "oose";
    private string $username = "root";
    private string $password = "";
    private PDO $db;

    function __construct()
    {
        $dbh = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->database . '', '' . $this->username . '', '' . $this->password . '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $dbh;
    }

    public function getDb(){
        return $this->db;
    }
    
}
