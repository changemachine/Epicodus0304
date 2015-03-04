<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/todo.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $test_task = new ToDo("Learn PHP.");
        $task2 = new ToDo("Learn Drupal.");
        $third_task = new ToDo("Visit France.");

        $list_of_tasks = array($test_task, $task2, $third_task);

        $output = "";

        foreach ($list_of_tasks as $task) {
            $output = $output . "<p>" . $task->getDescription() . "</p>";
        }

        return $output;

    });

    return $app;

?>
