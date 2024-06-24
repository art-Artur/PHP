<?php
    spl_autoload_register(function (string $className){
        require('../'.str_replace('\\', '/', $className).'.php');
    });

    $pageFound = false;
    $url = $_GET['route'] ?? "";
    $routes = require('../src/routes.php');
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $url, $matches);
        if (!empty($matches)){
            $pageFound = true;
            unset($matches[0]);
            $controller = new $controllerAndAction[0];
            $action = $controllerAndAction[1];
            $controller->$action(...$matches);
        }
    }
    if (!$pageFound) echo 'Страница не найдена';