<?php

if (isset($_POST['title'])) {
    require 'db_todo.php';

    $title=$_POST['title'];

    if (empty($title)) 
    {
        header("Location: todo.php?mess=error");
    }
    else
    {
        $stmt = $conn->prepare("INSERT INTO todolist.todos(title) VALUE(?)");
        $res =  $stmt->execute([$title]);

        if ($res) {
            header("Location: todo.php?mess=success");
        }
        else {
            header("Location: todo.php");
        }
        $conn=null;
        exit();
    }
}
else {
    header("Location: todo.php?mess=error");
}
?>