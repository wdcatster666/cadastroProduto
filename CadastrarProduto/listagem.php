<?php
echo '<link rel="stylesheet" href="style.css">';
echo '<meta charset="UTF-8">';
include 'conexao.php';

if(isset($_POST['busca_nome']) != '') {
	$sql = mysql_query("select * from produtos where
	       Descricao like  '{$_POST['busca_nome']}%' 
		   order by Descricao asc");
} else {
	$sql = mysql_query("select * from produtos 
	order by Descricao asc");
}
?>

<html>
	<body>
		<form class="formulario-listagem" name="frm_filtrar" method="POST" action="listagem.php">
            <label>Nome do Produto:</label> 
            <input type="text" name="busca_nome">
            <button type="submit" class="botao-lupa">
                <img src="lupa.png" height="30px" width="30px">
            </button>
        </form>	  
		<table class="tabela">
			<tr>
			<th colspan="6e" class="titulo-tabela">Produtos Cadastrados</th>
			</tr>
			<tr>
			<th class="colunas">Descrição</th>
			<th class="colunas">Categoria</th>
			<th class="colunas">Valor de Venda</th>
			<th class="colunas">Lucro</th>
			<th class="colunas">Qtd. Estoque</th>
			</tr>
			<tr>
					
			<?php
				while($linha = mysql_fetch_assoc($sql)) {
			?>
			<td class="registros"><?php echo $linha['Descricao']; ?></td>
			<td class="registros"><?php echo $linha['Categoria']; ?></td>
			<td class="registros"><?php echo $linha['ValVenda']; ?></td>
			<td class="registros"><?php echo $linha['LucroUnit']; ?></td>
			<td class="registros"><?php echo $linha['Estoque']; ?></td>
			<tr>
								
			<?php  } ?>
		</table>
		<?php
		echo '<center>';					
		echo '<a href="index.html" class="botao-voltar-inicio">VOLTAR AO INÍCIO</a>';
		?>
	</body>
</html>