<?php

namespace Task3;


class DatabaseConnection
{

    private string $host;
    private string $user;
    private string $password;
    private string $db;


    public function __construct()
    {
        require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Dotenv/Dotenv.php';
        $dotenv = new Dotenv(__DIR__ . '/.env');
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