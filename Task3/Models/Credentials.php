<?php

namespace Task3;

class Credentials
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '13092002';
    private $db = 'Project';

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }


}