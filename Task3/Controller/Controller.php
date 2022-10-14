<?php

namespace Task3;


class Controller
{
    public function main(){
        try {
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Models/Model.php';
            $model=new Model();
            global $arrayOfUsers;

            $arrayOfUsers = $model->getUserList();
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/View.php';
        }
        catch (\Error $e){
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/dbError.php';
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
    private function checkValid($array){
        if (filter_var($array['email'], FILTER_VALIDATE_EMAIL) && preg_match("/^[A-zА-я]*$/", $array['name'])) {
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/validation.php';

        }
    }
}