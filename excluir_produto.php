<?php
include_once("init.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (isset($_SESSION['produtos'][$id])) {
        unset($_SESSION['produtos'][$id]);

        // Reorganiza os índices do array
        $_SESSION['produtos'] = array_values($_SESSION['produtos']);
    }
}

// Redireciona de volta para o index
header('Location: index.php');
exit;