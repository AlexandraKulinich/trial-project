<?php
// include ..
//(new App)->run();

include '../src/App.php';
include '../src/controllers/Controller.php';
include '../src/controllers/AuthController.php';
include '../src/controllers/UserController.php';
include '../src/controllers/ErrorController.php';
include '../src/views/View.php';
include '../src/views/IndexView.php';
include '../src/views/LoginView.php';
include '../src/views/UserView.php';
include '../src/views/ErrorView.php';

$config = include '../src/config/main.php';

(new App($config))->run();

//
//
//$content = '';
//
//session_start();
//
//$controller = new Controller($config);
//var_dump($_POST);
//var_dump($_SERVER);
//
//
//if (!isset($_SESSION['login'])) {
//
//    $content = $controller->login();
//
//} else {
//
//    if (isset($_POST['logout'])) {
//        $content = $controller->logout();
//    } else {
//
//        $content = $controller->view();
//
//    }
//}
//
//if ($content) {
//    echo $controller->render('../src/templates/layout.php', ['content' => $content]);
//} else {
//    header("Refresh:0");
//}
