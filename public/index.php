<?php
require_once '../app/core/App.php';
require_once '../app/Middleware.php';
session_start();
$middleware = new middleware();
$middleware->checklogin();
$app = new App();
?>