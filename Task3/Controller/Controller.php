<?php


class Controller
{
    private $model;

    public function __construct()
    {
        try {
            require_once 'Models/Model.php';
            require_once 'Const/Const.php';
            $this->model = new Model();
        } catch (\Error $e) {
            require_once 'View/Errors/dbError.php';
        }
    }

    public function main()
    {

        if ($this->checkValid($_POST)) {
            try {
                if (isset($_POST['edit'])) {
                    $this->edit($_POST);
                }
                if (isset($_POST['add'])) {
                    $this->add($_POST);
                }
            } catch (\Exception $e) {
                require_once 'View/Errors/SameEmail.php';
            }
        }
        if (isset($_POST['delete'])) {
            $this->delete($_POST['delete']);
        }
        $arrayOfUsers = $this->model->getUserList();
        require_once 'View/View.php';
        $_POST = array();
    }


    private function add($insertArray)
    {
        $this->model->insertRecord($insertArray);
    }

    private function edit($editArray)
    {
        $this->model->updateRecord($editArray);
    }

    private function delete($deleteId)
    {
        $this->model->deleteRecord($deleteId);
    }

    private function checkValid($array): bool
    {
        if ($array !== array() && isset($array['name']) && isset($array['email']) &&
            (!filter_var($array['email'], FILTER_VALIDATE_EMAIL) || !preg_match("/^[A-z ]*$/", $array['name']))) {
            require_once 'View/Errors/validation.php';
            return false;
        } else return true;
    }
}