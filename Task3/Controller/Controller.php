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
            require_once 'View/Errors/DatabaseConnectionError.php';
        } catch (\InvalidArgumentException|\mysqli_sql_exception $e) {
            require_once 'View/Errors/EnvError.php';
        }
    }

    public function main(): void
    {
        $isFatalError = false;
        if (!empty($_POST)) {
            try {
                if (isset($_POST['edit'])) {
                    $this->editData($_POST);
                }
                if (isset($_POST['add'])) {
                    $this->addData($_POST);
                }
                if (isset($_POST['delete'])) {
                    $this->deleteData($_POST['delete']);
                }
            } catch (\InvalidArgumentException $e) {
                require_once 'View/Errors/ValidationError.php';
            } catch (\mysqli_sql_exception $e) {
                $isFatalError = $this->handleSqlError($e);
            }
        }
        if (!$isFatalError) {
            $arrayOfUsers = $this->model->getUserList();
            require_once 'View/View.php';
        }
    }


    private function addData(array $insertArray): void
    {
        $this->model->insertUser($insertArray);
    }

    private function editData(array $editArray): void
    {
        $this->model->updateUserData($editArray);
    }

    private function deleteData(string $deleteId): void
    {
        $this->model->deleteUser($deleteId);
    }

    private function handleSqlError(\Exception $e): bool
    {
        $flag = false;
        if ($e->getCode() === 1054) {
            require_once 'View/Errors/DatabaseStructureError.php';
            $flag = true;
        } else {
            require_once 'View/Errors/SameEmail.php';
        }

        return $flag;
    }
}