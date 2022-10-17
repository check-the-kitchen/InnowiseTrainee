<?php

namespace Task3;

class Model
{
    private \mysqli $link;

   public function __construct()
    {

        require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Models/DatabaseConnection.php';

        $conn=new DatabaseConnection();
        try {
            $this->link = $conn->connectDatabase();
        }
        catch (\Exception $e){
            var_dump($e);
        }
    }


    public function getUserList():array{
        $result=[];
        $usersListRequest="SELECT * FROM Users";
        $data=$this->link->query($usersListRequest);

        while ($row=mysqli_fetch_array($data)){
            $result[]=$row;
        }
        return $result;
    }


    /**
     * @throws \Exception
     */
    public function updateRecord($id, $data){
        $uploadRequest="UPDATE Users SET email = '".$data['email']."', name = '" .$data['name']."', gender = '" .$data['gender']."', status = '" .$data['status']."' WHERE id = $id";
        $this->dbDump();
        if(!$this->link->query($uploadRequest)){
            throw new \Exception();
        }
    }


    /**
     * @throws \Exception
     */
    public function insertRecord($data){
        $insertRequest="INSERT INTO Users (email, name, gender, status) VALUES ( '".$data['email']."', '".$data['name']."', '".$data['gender']."', '".$data['status']."' )";
        $this->dbDump();
        if(!$this->link->query($insertRequest)){
            throw new \Exception();
        }

   }


    /**
     * @throws \Exception
     */
    public function deleteRecord(string $id){
        $deleteRequest="DELETE FROM Users WHERE id = $id";
        $this->dbDump();
       if(!$this->link->query($deleteRequest)){
            throw new \Exception();
       }
    }

    private function dbDump(){
       $dir = dirname(__FILE__) . '/Dumps/dump.sql';
        exec("mysqldump --user=root --password=13092002 --host=localhost Project --result-file={$dir} 2>&1", $output);
    }

}