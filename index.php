<?php
if (!empty($_POST['submit'])) {
    $action = $_POST['submit'];
} else if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "index";
}
if (is_file("controlador/controlador_" . $action . ".php")) {
    include_once("controlador/controlador_" . $action . ".php");
} else {
    echo "PÁGINA EN CONSTRUCCIÓN ";
}
?>
