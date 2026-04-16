<?php
include_once("init.php");

if (isset($_GET["id"]) && isset($_GET["acao"])) {
    $id = (int) $_GET["id"];
    $acao = $_GET["acao"];

    if (isset($_SESSION["produtos"][id])) {
        if ($acao === "somar") {
            $_SESSION["produtos"][id]["quantidade"]++;
        } elseif ($acao === "subtrair") {
            if ($_SESSION["produtos"][id]["quantidade"] > 0) {
                $_SESSION["produtos"][id]["quantidade"]--;
            } else {
                $_SESSION["mensagem"] = "A quantidade já está em 0.";
            }
        }
    }
}

header("Location: index.php");
exit;
