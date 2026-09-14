<?php
echo '<link rel="stylesheet" href="style.css">';
echo '<meta charset="UTF-8">';
include 'conexao.php';

$descricao = $_POST["txt_produto"];
$categoria = $_POST["txt_tipo"];
$compra = $_POST["txt_vcompra"];
$venda = $_POST["txt_vvenda"];
$estoque = $_POST["txt_qtd_estoque"];
$lucro = $venda - $compra;
$sql = mysql_query ("select * from produtos
                    where Descricao = '$descricao'");

if (empty($descricao) ||
    empty($categoria) ||
    empty($compra) ||
    empty($venda) ||
    empty($estoque)) {
        echo '<div class="caixa-sistema">';
        echo '<h1 class="titulo-mensagem">Atenção!</h1>';
        echo '<hr>';
        echo '<p class="mensagem-sistema">Preencha todos os campos!</p>';
        echo '<a href="index.html" class="botao-voltar">RETORNAR</a>';        
        echo '</div>';
        return;     
} 

if ($categoria === "Eletrodomésticos") {
    $categoria = "Eletrodomesticos";
}

if ($categoria === "Informática") {
    $categoria = "Informatica";
}

if ($categoria === "Móveis") {
    $categoria = "Moveis";
}

if ($categoria === "Utilitários") {
    $categoria = "Utilitarios";
}

if (mysql_num_rows($sql) > 0) {
    echo '<div class="caixa-sistema">';
    echo '<h1 class="titulo-mensagem">Ops!</h1>';
    echo '<hr>';
    echo '<p class="mensagem-sistema">Produto já cadastrado!</p>';
    echo '<a href="index.html" class="botao-voltar">RETORNAR</a>'; 
    echo '</div>';
    return;
}

else {
    $sql = mysql_query("insert into produtos (Descricao, Categoria, ValVenda, LucroUnit, Estoque)
                        values ('$descricao', '$categoria', '$venda', '$lucro', $estoque)");
    echo '<div class="caixa-sistema">';
    echo '<h1 class="titulo-mensagem">Sucesso!</h1>';
    echo '<hr>';
    echo '<p class="mensagem-sistema">Produto cadastrado com sucesso!</p>';
    echo '<a href="index.html" class="botao-voltar">RETORNAR</a>'; 
    echo '</div>';
        return;
}
?>