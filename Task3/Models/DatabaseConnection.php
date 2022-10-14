<?php

namespace Task3;

class DatabaseConnection
{

    private $host;
    private $user;
    private $password;
    private $db;


    public function __construct()
    {
        require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Models/Credentials.php';
        $cred=new Credentials();
        $this->host=$cred->getHost();
        $this->db=$cred->getDb();
        $this->password=$cred->getPassword();
        $this->user=$cred->getUser();
    }
    public function connectDatabase(): \mysqli
    {
        return new \mysqli($this->host,$this->user, $this->password, $this->db);
    }
}