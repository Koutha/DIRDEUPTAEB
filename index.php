<?php
if (!empty($_POST['submit'])) {
    $action = $_POST['submit'];
} else if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "index";
}
htmlspecialchars($action,ENT_QUOTES);
$action = strval(str_replace("\0", "", $action));
if (is_file("controlador/controlador_" . $action . ".php")) {
    include_once("controlador/controlador_" . $action . ".php");
} else {
    echo "PÁGINA EN CONSTRUCCIÓN ";
}
?>
