<?php


class Model
{
    private \mysqli $databaseLink;

    public function __construct()
    {
        require_once 'Database/DatabaseConnection.php';
        $conn = new DatabaseConnection();
        $this->databaseLink = $conn->connectDatabase();

    }

    public function __destruct()
    {
        $this->databaseLink->close();
    }


    public function getUserList(): array
    {
        $result = [];
        $usersListRequest = "SELECT * FROM Users";
        $data = $this->databaseLink->query($usersListRequest);
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }

        return $result;
    }


    public function updateUserData(array $data): void
    {
        if ($this->checkValid($data)) {
            $uploadRequest = "
            UPDATE Users 
            SET email =  '{$data['email']}', name = '{$data['name']}', gender = '{$data['gender']}', status = '{$data['status']}' 
            WHERE id = {$data['edit']}
            ";
            $this->databaseLink->query($uploadRequest);
        } else {
            throw new \InvalidArgumentException("incorrect input", 3);
        }
    }


    public function insertUser(array $data): void
    {
        if ($this->checkValid($data)) {
            $insertRequest = "
            INSERT INTO Users (email, name, gender, status) 
            VALUES ( '{$data['email']}', '{$data['name']}', '{$data['gender']}', '{$data['status']}' )";
            $this->databaseLink->query($insertRequest);
        } else {
            throw new \InvalidArgumentException("incorrect input", 3);
        }
    }


    public function deleteUser(string $id): void
    {
        if (intval($id)) {
            $deleteRequest = "DELETE FROM Users WHERE id = $id";
            $this->databaseLink->query($deleteRequest);
        } else {
            throw new \InvalidArgumentException("incorrect input", 3);
        }
    }


    private function checkValid(array $array): bool
    {
        return filter_var($array['email'], FILTER_VALIDATE_EMAIL) && preg_match("/^[A-z ]*$/", $array['name']);
    }


}