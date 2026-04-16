<?php
require_once "init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $categoria = trim($_POST["categoria"]);
    $preco = trim($_POST["preco"]);
    $quantidade = trim($_POST["quantidade"]);

    if (
        empty($nome) ||
        empty($categoria) ||
        empty($preco) ||
        empty($quantidade)
    ) {
        echo "Preencha todos os campos obrigatórios.";
        exit;
    } elseif (!is_numeric($quantidade) || !is_numeric($preco)) {
        echo "Os campos Preço e Quantidade devem ser números.";
        exit;
    } elseif ($quantidade < 0|| $preco < 0){
        echo "A Quantidade e Preço não deve ser negativo";
        exit;
    }

    $novoProduto = [
        "id" => count($_SESSION["produtos"]) + 1,
        "nome" => $nome,
        "preco" => $preco,
        "categoria" => $categoria,
        "quantidade"=> $quantidade
    ];

    $_SESSION["produtos"][] = $novoProduto;

    header("Location: index.php");
    exit;
}
?>