<?php

if (isset($_GET['start'])) {
    $start = $_GET['start'];
} else {
    $start = 1;
}
if (isset($_GET['end'])) {
    $end = $_GET['end'];
} else {
    $end = 49;
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Exercise 2</title>
    </head>
    <body>
    <form action="#" method="POST">
        <h1>Witaj w symulatorze lotto</h1>
        <h5><?php echo "Wybierz 6 liczb od $start do $end:"; ?></h5>
        <?php
        for ($i = $start; $i <= $end; $i++) {
            echo "<label>$i" . "<input type=\"checkbox\" name=\"$i\">" . "</label>";
            if ($i % 7 == 0) {
                echo "<br>";
            }
        }
        ?>
        <p>
            <input type="submit" value="Losuj">
        </p>
    </form>
    </body>
    </html>

<?php

function lotto($start, $end)
{
    $nums = range($start, $end);
    shuffle($nums);
    $result = array_slice($nums, 0, 6);
    sort($result);
    return $result;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') and (count($_POST) != 6)) {
    echo "Wybierz 6 liczb.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerNums = [];
    foreach ($_POST as $key => $value) {
        $playerNums[] = $key;
    }

    $nums = lotto($start, $end);
    $counter = 0;

    echo "<br>Wylosowane liczby: ";
    foreach ($nums as $item) {
        echo "$item ";
    }
    echo "<br>Twoje liczby: ";
    foreach ($playerNums as $item) {
        echo "$item ";
        if (in_array($item, $nums)) {
            $counter++;
        }
    }
    echo "<br>Liczba trafień: " . $counter . ".";
}
?>