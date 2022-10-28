<?php

require_once "Application/Core/Controller.php";
class TestController extends Controller
{
    public function echoAction()
    {
        header("Location: /");
    }
}