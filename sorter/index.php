<?php
    session_start();

    $db = require('./db/db.php');
    $connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) echo mysqli_connect_error();

    // if ($_GET['p'] == 'view' || $_GET['p'] == 'add' ||  $_GET['p'] == 'update' ||  $_GET['p'] == 'delete') require($_GET['p'].'.php');
    
    if (!isset($_GET['p'])) $_GET['p'] = 'view';

    
    
    if (isset($_POST['reg'])) {
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')";
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysli_error($connect);
        else $s = 'Запись успешна добавлена';
    }

    if (isset($_POST['sing'])) {
        $email = $_POST['email'];
        $sql = "SELECT `id`, `name`, `email`, `password` FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($connect, $sql);
    
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($_POST['password'] == $user['password']) {
                $_SESSION['user_name'] = $user['name'];
            } 
        }
    }


    require('header.php');
    
    if ($_GET['p'] == 'reg' || $_GET['p'] == 'sing' || $_GET['p'] == 'out') require('./reg/'.$_GET['p'].'.php');
    if ($_GET['p'] == 'view' || $_GET['p'] == 'sms' || $_GET['p'] == 'add') require('./pages/'.$_GET['p'].'.php');
    
    
    // echo $_SESSION['user_name'];

    require('footer.html');
