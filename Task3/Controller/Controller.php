<?php


class Controller
{
    private $model;

    public function __construct()
    {
        try {
            require_once 'Const/Const.php';
            require_once 'Models/Model.php';
            $this->model = new Model();
            $arrayOfUsers = $this->model->getUserList();
            require_once 'View/View.php';
        } catch (\Error $e) {
            require_once 'View/Errors/dbError.php';
        }
    }

    public function main()
    {

        if ($this->checkValid($_POST)) {
            if (isset($_POST['edit'])) {
                $this->edit($_POST);
            }
            if (isset($_POST['add'])) {
                $this->add($_POST);
            }
        }
        if (isset($_POST['delete'])) {
            $this->delete($_POST['delete']);
        }
    }


    private function add($insertArray)
    {
        $this->model->insertRecord($insertArray);
        $this->refresh();
    }

    private function edit($editArray)
    {
        $this->model->updateRecord($editArray);
        $this->refresh();
    }

    private function delete($deleteId)
    {
        $this->model->deleteRecord($deleteId);
        $this->refresh();
    }

    private function refresh()
    {
        $_POST = array();
        echo "<meta http-equiv='refresh' content='0'>";
//        try {
//            var_dump($_SERVER);
//            header("Location: {$_SERVER['SCRIPT_FILENAME']}");
//            exit();
//        }
//        catch (\Exception $e){
//            var_dump($e);
//        }
    }

    private function checkValid($array): bool
    {
        if (filter_var($array['email'], FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-z ]*$/", $array['name'])) {
            require_once 'View/Errors/validation.php';
            return false;
        } else return true;
    }
}