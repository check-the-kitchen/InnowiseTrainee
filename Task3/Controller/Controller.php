<?php

namespace Task3;

try{
require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Models/Model.php';
}
catch (\Error $ex){
    var_dump($ex);

}
class Controller
{
    public function main(){
        $model=new Model();
        global $arrayOfUsers;
        try {
            $arrayOfUsers = $model->getUserList();
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/View.php';
        }
        catch (\Error $e){
            var_dump($e);
        }
        if(isset($_POST['edit'])) {
            $model->updateRecord($_POST['edit'],$_POST);
            $_POST=array();
            echo "<meta http-equiv='refresh' content='0'>";

        }
        if(isset($_POST['delete'])) {
            $model->deleteRecord($_POST['delete']);
            $_POST=array();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        if(isset($_POST['add'])) {
            $model->insertRecord($_POST);
            $_POST=array();
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }
}