<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/todo.php";

    session_start();
    if(empty($_SESSION['list_of_tasks'])){
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function() {
        // $test_task = new Task("Learn PHP.");
        // $task2 = new Task("Learn Drupal.");
        // $third_task = new Task("Visit France.");
        // $list_of_tasks = array($test_task, $task2, $third_task);

        $output = "";

        // foreach ($list_of_tasks as $task) {
        //     $output = $output . "<p>" . $task->getDescription() . "</p>";
        // }

        // $all_tasks = Task::getAll(); ANOTHER WAY OF SENDING THAT getAll() BIZNESS DOWN THERE IN THE IF()

        if (!empty(Task::getAll())) {
            $output = $output . "
                <h1>To Do List</h1>
                <ul>";
            foreach (Task::getAll() as $task) {
                $output = $output . "<p>" . $task->getDescription() . "</p>";
            }

            $output = $output . "</ul>";
        }


        // foreach (Task::getAll() as $task) {
        //     $output = $output . "<p>" . $task->getDescription() . "</p>";
        // }

        $output = $output."</ul>
            <form action='/tasks' method='post'>
                <label for='description'>To Do:</label>
                <input id='description' name='description' type='text'>

                <button type='submit'>Submit</button>
            </form>
        ";

        return $output;

    });

    $app->post("/tasks", function() {
        $task = new Task($_POST['description']);
        $task->save();
        return "
            <h1>You created a task!</h1>
            <p>" . $task->getDescription() . "</p>
            <p><a href='/'>View your list of things to do.</a></p>
        ";
    });

    return $app;

?>
