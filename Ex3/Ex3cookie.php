<?php
if (isset($_COOKIE['date'])) {
    setcookie('date', 'exit', time() - 3600);
    echo 'Ciasteczko usuniete' . '<br><a href="Ex3.php">Wroc do poprdzedniej strony</a>';
} else {
    echo 'Brak ciasteczek';
}