<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/todo.php";

    session_start();
    if(empty($_SESSION['list_of_tasks'])){
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function() {
        // $test_task = new ToDo("Learn PHP.");
        // $task2 = new ToDo("Learn Drupal.");
        // $third_task = new ToDo("Visit France.");
        //
        // $list_of_tasks = array($test_task, $task2, $third_task);



        $output = "";

        // foreach ($list_of_tasks as $task) {
        //     $output = $output . "<p>" . $task->getDescription() . "</p>";
        // }

        foreach (ToDo::getAll() as $task) {
            $output = $output . "<p>" . $task->getDescription() . "</p>";
        }

        $output = $output."</ul>
            <form action='/tasks' method='post'>
                <label for='description'>To Do:</label>
                <input id='description' name='description' type='text'>
                <button type='submit'>Submit</button>
            </form>
        ";
        
        return $output;

    });

    return $app;

?>
