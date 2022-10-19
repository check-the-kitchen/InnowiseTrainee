<?php


class Model
{
    private \mysqli $link;

    public function __construct()
    {
        require_once 'Models/DatabaseConnection.php';
        $conn = new DatabaseConnection();
        $this->link = $conn->connectDatabase();

    }


    public function getUserList(): array
    {
        $result = [];
        $usersListRequest = "SELECT * FROM Users";
        $data = $this->link->query($usersListRequest);
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }
        return $result;
    }


    public function updateRecord($data)
    {
        $uploadRequest = "
            UPDATE Users 
            SET email =  '{$data['email']}', name = '{$data['name']}', gender = '{$data['gender']}', status = '{$data['status']}' 
            WHERE id = {$data['edit']}
            ";
        if (!$this->link->query($uploadRequest)) {
            throw new \Error();
        }
    }


    public function insertRecord($data)
    {
        $insertRequest = "
            INSERT INTO Users (email, name, gender, status) 
            VALUES ( '{$data['email']}', '{$data['name']}', '{$data['gender']}', '{$data['status']}' )";
        if (!$this->link->query($insertRequest)) {
            throw new \Error();
        }

    }


    public function deleteRecord(string $id)
    {
        $deleteRequest = "DELETE FROM Users WHERE id = $id";
        if (!$this->link->query($deleteRequest)) {
            throw new \Error();
        }
    }


}