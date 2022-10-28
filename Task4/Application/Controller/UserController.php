<?php


require_once 'Application/Core/Controller.php';
require_once 'Application/Models/UserModel.php';
require_once 'Application/Validators/UserInfoValidator.php';
require_once 'config/Const.php';


class UserController extends Controller
{
    const SUCCESS_CODE = ['MIN_CODE' => 200,
        'MAX_CODE' => 299];
    private UserModel $model;


    public function mainAction(): void
    {
        $this->model = new UserModel();
        if (UserInfoValidator::isValid()) {
            if (isset($_POST['edit'])) {
                $this->editData($_POST);
            }
            if (isset($_POST['add'])) {
                $this->addData($_POST);
            }
            if (isset($_POST['delete'])) {
                $this->deleteData($_POST['delete']);
            }
        }
        $arrayOfUsers = [];
        if ($this->checkEnvFile()) {
            $arrayOfUsers = $this->model->getUserList();
        }
        require_once 'Application/View/View.php';
        if (isset($_SESSION['errors'])) {
            require_once 'Application/View/ErrorModalWindow.php';
        }
        unset($_SESSION['errors']);
        unset($_SESSION['success']);


    }


    private function addData(array $insertArray): void
    {
        $this->checkResponse($this->model->insertUser($insertArray), "Addition");

        header("Location: /Task4");
        exit();
    }

    private function editData(array $editArray): void
    {
        $this->checkResponse($this->model->updateUserData($editArray), "Update");
        header("Location: /Task4");
        exit();
    }

    private function deleteData(string $deleteId): void
    {
        $this->checkResponse($this->model->deleteUser($deleteId), "Deletion");
        header("Location: /Task4");
        exit();
    }


    private function checkEnvFile(): bool
    {
        if (isset($_ENV['API_URL']) && isset($_ENV['API_ACCESS_TOKEN'])) {
            return true;
        } else {
            $_SESSION['errors'][] = "Check your .env.example file";
            return false;
        }
    }

    private function checkResponse(int $response, string $action): void
    {
        if ($response < self::SUCCESS_CODE['MIN_CODE'] || $response > self::SUCCESS_CODE['MAX_CODE']) {
            $_SESSION['errors'][] = "Api returned error with code $response";
        } else $_SESSION['success'] = $action." is succeed!";
    }
}