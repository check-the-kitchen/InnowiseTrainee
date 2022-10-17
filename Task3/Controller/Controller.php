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
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/Errors/dbError.php';
        }
        if($this->checkValid($_POST)) {
            if (isset($_POST['edit'])) {

                $model->updateRecord($_POST['edit'], $_POST);
                $_POST = array();
                echo "<meta http-equiv='refresh' content='0'>";

            }
            if (isset($_POST['add'])) {
                $model->insertRecord($_POST);

                $_POST = array();
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        if (isset($_POST['delete'])) {
            $model->deleteRecord($_POST['delete']);
            $_POST = array();
//            $delay = 1; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
//            header("Refresh: $delay");
//            exit;
            echo "<meta http-equiv='refresh' content='0'>";
//            header("Location: /Task3/index.php");
        }
    }
    private function checkValid($array):bool{
        if (filter_var($array['email'], FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-z ]*$/", $array['name'])) {
            require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/View/Errors/validation.php';
            return false;
        }
        else return true;
    }
}