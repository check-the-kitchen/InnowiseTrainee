<?php


class UserDataValidator
{
    public static function isValid(): bool
    {
        if (!empty($_POST)) {
            if (isset($_POST['delete']) && is_numeric($_POST['delete'])) {
                return true;
            } elseif (self::isEmailValid() && self::isGenderValid() && self::isNameValid() && self::isStatusValid()) {
                return true;
            } else {
                $_SESSION['errors'][] = 'Invalid Input';
                return false;
            }
        }

        return true;
    }


    private static function isNameValid(): bool
    {
        return preg_match("/^[A-z .]*$/", $_POST['name']);
    }

    private static function isEmailValid(): bool
    {
        return filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    private static function isGenderValid(): bool
    {
        return in_array($_POST['gender'], GENDER);
    }

    private static function isStatusValid(): bool
    {
        return in_array($_POST['status'], STATUS);
    }
}