<?php
    $db = require('db.php');
    $connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) echo 'Wrong connect: '.mysqli_connect_error();

    if (isset($_POST['save'])){
        $sql = "INSERT INTO `friends`(`firstname`, `name`, `lastname`, `gender`,
                                 `date`, `email`, `address`, `phone`, `comment`) 
                VALUES ('".htmlspecialchars($_POST['firstname'])."',
                        '".htmlspecialchars($_POST['name'])."',
                        '".htmlspecialchars($_POST['lastname'])."',
                        '".($_POST['gender'])."',
                        '".($_POST['date'])."',
                        '".htmlspecialchars($_POST['email'])."',
                        '".htmlspecialchars($_POST['address'])."',
                        '".($_POST['phone'])."',
                        '".htmlspecialchars($_POST['comment'])."'
                        )";
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса :'.mysqli_error($connect);
            else $s = 'Запись успешна добавлена!';
    }

    if (isset($_POST['update'])){
        $sql = "UPDATE `friends` SET 
                        `firstname`='".htmlspecialchars($_POST['firstname'])."',
                        `name`='".htmlspecialchars($_POST['name'])."',
                        `lastname`='".htmlspecialchars($_POST['lastname'])."',
                        `gender`='".($_POST['gender'])."',
                        `date`='".($_POST['date'])."',
                        `email`='".htmlspecialchars($_POST['email'])."',
                        `address`='".htmlspecialchars($_POST['address'])."',
                        `phone`='".($_POST['phone'])."',
                        `comment`='".htmlspecialchars($_POST['comment'])."' 
                WHERE `id`=".$_POST['id'];
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса :'.mysqli_error($connect);
            else $s = 'Запись успешна обновлена!';
    }

    if (!isset($_GET['p'])) $_GET['p'] = 'view';
    if (!isset($_GET['o'])) $_GET['o'] = 'id';
    if (!isset($_GET['page'])) $_GET['page'] = '0';
    require('header.php');
        if ($_GET['p'] == 'view' || $_GET['p'] == 'add' || $_GET['p'] == 'update' || $_GET['p'] == 'delete') 
            require($_GET['p'].'.php');
    require('footer.html');