<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/todo.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "Hello";
    });

    return $app;

?>
