<?php

namespace Task3;


class Controller
{
    public function main(){
        require $_SERVER['DOCUMENT_ROOT'].'/InnowiseTrainee/Task3/Controller/Const/Const.php';
        //echo ABS_PATH;
        try {
            require ABS_PATH.'/Models/Model.php';
            $model=new Model();

            global $arrayOfUsers;

            $arrayOfUsers = $model->getUserList();
            require ABS_PATH.'/View/View.php';
        }
        catch (\Error $e){
            var_dump($e);
            require ABS_PATH.'/View/Errors/dbError.php';
        }
        if($this->checkValid($_POST)) {
            if (isset($_POST['edit'])) {

                $model->updateRecord($_POST['edit'], $_POST);
                $this->refresh();

            }
            if (isset($_POST['add'])) {
                $model->insertRecord($_POST);

                $this->refresh();
            }
        }
        if (isset($_POST['delete'])) {
            $model->deleteRecord($_POST['delete']);
            $this->refresh();
//            header("Location: /Task3/index.php");
        }
    }
    private function checkValid($array):bool{
        if (filter_var($array['email'], FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-z ]*$/", $array['name'])) {
            require ABS_PATH.'/View/Errors/validation.php';
            return false;
        }
        else return true;
    }
    private function refresh(){
        $_POST = array();
        echo "<meta http-equiv='refresh' content='0'>";
    }
}