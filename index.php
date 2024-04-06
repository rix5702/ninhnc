<?php 
if(session_status() === PHP_SESSION_NONE)
    session_start();
require './core/database.php';
require './models/baseModel.php';
require './controllers/baseController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid p-0">
    <?php
        if(isset($_GET['controller'])){
            $controllerName = $_GET['controller'].'Controller';
            // include file controller
            require "./controllers/".$controllerName.".php";
            // khoi tao doi tuong 
            $controllerObject = new $controllerName;
            $actionName = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
            // goi ham 
            $controllerObject->$actionName();
        }
    ?>
    </div>
</body>
</html>
