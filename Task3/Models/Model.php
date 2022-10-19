<?php

namespace Task3;

class Model
{
    private \mysqli $link;

    public function __construct()
    {

        require 'Models/DatabaseConnection.php';

        $conn = new DatabaseConnection();
        try {
            $this->link = $conn->connectDatabase();
        } catch (\Exception $e) {
            var_dump($e);
        }
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


    /**
     * @throws \Exception
     */
    public function updateRecord($id, $data)
    {
        $uploadRequest = "UPDATE Users SET email = '" . $data['email'] . "', name = '" . $data['name'] . "', gender = '" . $data['gender'] . "', status = '" . $data['status'] . "' WHERE id = $id";
        if (!$this->link->query($uploadRequest)) {
            throw new \Exception();
        }
    }


    /**
     * @throws \Exception
     */
    public function insertRecord($data)
    {
        $insertRequest = "INSERT INTO Users (email, name, gender, status) VALUES ( '" . $data['email'] . "', '" . $data['name'] . "', '" . $data['gender'] . "', '" . $data['status'] . "' )";
        if (!$this->link->query($insertRequest)) {
            throw new \Exception();
        }

    }


    /**
     * @throws \Exception
     */
    public function deleteRecord(string $id)
    {
        $deleteRequest = "DELETE FROM Users WHERE id = $id";
        if (!$this->link->query($deleteRequest)) {
            throw new \Exception();
        }
    }


}