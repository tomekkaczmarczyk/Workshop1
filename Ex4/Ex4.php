<?php

session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
} elseif (($_SERVER['REQUEST_METHOD'] === 'POST')
    and (!in_array($_POST['task'], $_SESSION['tasks']))
) {
    $_SESSION['tasks'][] = $_POST['task'];
    setcookie('tasks', serialize($_SESSION['tasks']));
}
if (isset($_COOKIE['tasks'])) {
    $cookie = unserialize($_COOKIE['tasks']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 4</title>
</head>
<body>

<h3>Twoja lista zadań:</h3>
<table border="1" bgcolor="#00ff7f">
    <?php
    foreach ($_SESSION['tasks'] as $task) {
        echo "<tr>
    <td> $task</td>
    </tr>";
    }
    ?>
</table>
<form action="#" method="POST">
    <p>
        <label><h4>Wpisz zadanie:</h4>
            <input type="text" name="task">
        </label>
    </p>
    <p>
        <input type="submit" value="Dodaj zadanie">
    </p>
</form>
</body>
</html>