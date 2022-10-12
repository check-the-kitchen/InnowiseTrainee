<?php

namespace Task3;

class Model
{
    public $link;

   public function __construct()
    {
        $this->link=new \mysqli("localhost","root", "13092002", "Project");
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
    

    public function updateRecord($id,$data):string{
        $uploadRequest="UPDATE Users SET email = '".$data['email']."', name = '" .$data['name']."', gender = '" .$data['gender']."', status = '" .$data['status']."' WHERE id = $id";
        $this->dbDump();
        if($this->link->query($uploadRequest)){
            return "everything alright";
        }
        else{
            return "smt wrong";
        }
    }


    public function insertRecord($data):string{
        $insertRequest="INSERT INTO Users (email, name, gender, status) VALUES ( '".$data['email']."', '".$data['name']."', '".$data['gender']."', '".$data['status']."' )";
        $this->dbDump();
        if($this->link->query($insertRequest)) return "everything alright";
        else{
            return "smt wrong";
        }
   }


    public function deleteRecord(string $id){
        $deleteRequest="DELETE FROM Users WHERE id = $id";
        $this->dbDump();
        return $this->link->query($deleteRequest);
    }

    private function dbDump(){
       $dir = dirname(__FILE__).'/Dumps/dump.sql';
        exec("mysqldump --user=root --password=13092002 --host=localhost Project --result-file={$dir} 2>&1", $output);
    }

}