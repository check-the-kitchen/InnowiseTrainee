<?php


class DatabaseConnection
{

    private string $host;
    private string $user;
    private string $password;
    private string $db;


    public function __construct()
    {
        require_once 'Dotenv/Dotenv.php';
        $dotenv = new Dotenv(__DIR__ . '/.env.example');
        $dotenv->load();
        $this->host = getenv('DATABASE_HOST');
        $this->user = getenv('DATABASE_USER');
        $this->password = getenv('DATABASE_PASSWORD');
        $this->db = getenv('DATABASE_NAME');
    }


    public function connectDatabase(): \mysqli
    {
        return new \mysqli($this->host, $this->user, $this->password, $this->db);
    }

}