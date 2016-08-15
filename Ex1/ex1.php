<?php
if (isset($_POST['userName'])) {
    $name = ucfirst(trim($_POST['userName']));
}
echo("Czesc $name !");