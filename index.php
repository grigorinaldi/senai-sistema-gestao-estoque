<?php
require_once "init.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstruTech</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <img src="./Imagens/logoconstrutech.png" alt="Logo da ConstruTech" class="logo" style="width: 180px;">
        <div>
            <h1>Sistema de Gestão de Estoque</h1>
        </div>
    </header>

    <main class="conteiner">
        <section class="box">
            <h2 class="titulo">Novo produto</h2>
            <form class="form-produto" action="recebe_produto.php" method="POST">
                <div class="campo">
                    <label for="nome">Nome do produto</label>
                    <input type="text" id="nome" name="nome">
                </div>

                <div class="campo">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria">
                        <option selected disabled>Selecione</option>
                        <option>Bruto</option>
                        <option>Ferramentas</option>
                        <option>Acabamento</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade">
                </div>

                <div class="campo">
                    <label for="preco">Preço Unitário</label>
                    <input type="number" id="preco" name="preco" step="0.01">
                </div>

                <button type="submit" class="btn-cadastrar">Cadastrar</button>
            </form>
        </section>
    </main>

    <main class="conteiner">
        <section id="inventario" class="box">
            <h2 class="titulo">Inventário</h2>

            <table class="tabela-inventario">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($_SESSION['produtos']);
                    foreach ($_SESSION['produtos'] as $index => $produto) {
                        echo "<tr>";
                        echo "<td>{$produto['nome']}</td>";
                        echo "<td>{$produto['categoria']}</td>";
                        echo "<td>{$produto['quantidade']}</td>";
                        echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                        echo "<td>R$ " . number_format($produto['quantidade'] * $produto['preco'], 2, ',', '.') . "</td>";
                        echo "<td>
                                <div class='acoes-botoes'>
                                    <a href='alterar_quantidade.php?id={$index}&acao=subtrair'>
                                        <button class='btn-acao editar'>-1</button>
                                    </a>
                                    <a href='alterar_quantidade.php?id={$index}&acao=somar'>
                                        <button class='btn-acao editar'>+1</button>
                                    </a>
                                    <a href='excluir_produto.php?id={$index}'onclick='return confirm(\"Tem certeza que deseja excluir?\")'>
                                        <button class='btn-acao excluir'>Excluir</button>
                                    </a>
                                </div>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                    <!-- <tr>
                            <td>Cimento</td>
                            <td>Bruto</td>
                            <td>10</td>
                            <td>R$ 35,00</td>
                            <td>R$ 350,00</td>
                            <td>
                                <button class="btn-acao editar">+1</button>
                                <button class="btn-acao editar">-1</button>
                                <button class="btn-acao excluir">Excluir</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Martelo</td>
                            <td>Ferramentas</td>
                            <td>5</td>
                            <td>R$ 28,90</td>
                            <td>R$ 144,50</td>
                            <td>
                                <button class="btn-acao editar">+1</button>
                                <button class="btn-acao editar">-1</button>
                                <button class="btn-acao excluir">Excluir</button>
                            </td>
                        </tr> -->
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <h1>Valor total do estoque:</h1>
        <p class="valor-estoque">R$ 494,50</p>
    </footer>
</body>

</html>