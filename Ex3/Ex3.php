<?php
if (!isset($_COOKIE['date'])) {
    echo "Witaj nowy użytkowniku! Dostałeś właśnie ciasteczko";
} else {
    $date = unserialize($_COOKIE['date']);
    echo "Witaj! Ostatni raz nas odwiedziłeś: $date";
    echo "<br><br>";
    echo "Aby usunąć ciasteczko kliknij:";
}
$date = serialize(date('d F Y G:m:s'));
setcookie('date', $date);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 3</title>
</head>
<body>
<form action="Ex3cookie.php" method="POST">
    <p>
        <input type="submit" value="Usuń ciasteczko">
    </p>
</form>
</body>
</html>