<?php
ini_set('display_errors',1);
require_once "Application/Core/Router.php";
require_once "Application/Dotenv/Dotenv.php";
(new DotEnv('config/.env.example'))->load();
session_start();
Router::start();