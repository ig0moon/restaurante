<?php
	require_once 'cabecalho.php';
?>

	<form action="alterarproduto.php" method="POST" class="normal">
		<h1>Buscar</h1>
		<p><input type="search" name="busca" required></p>
		<p><input type="submit" name="botao" value="Buscar"></p>

	</form>

<?php
	if (isset($_POST['botao'])){
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();

		$consulta=$produtopa->buscar($_POST['busca']);

		if (!$consulta){
			echo "<h2>Nenhum produto encontrado.</h2>";
		} else{
			echo "<table>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>Nome</th>";
			echo "<th>Descrição</th>";
			echo "<th>Valor R$</th>";
			echo "<th>Imagem</th>";
			echo "<th>Alterar</th>";
			echo "<th>Excluir</th>";
			echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$linha['id']."</td>";
				echo "<td>".$linha['nome']."</td>";
				echo "<td>".$linha['descricao']."</td>";
				echo "<td>".$linha['valor']."</td>";
				echo "<td><img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'></td>";

				echo "<td><form action='alterar.php' method='POST'>"."<input type='hidden' name='id' value='".$linha['id'].
					"'><input type='submit' name='botao' value='Alterar'></form>"."</td>";

				echo "<td><form action='excluir.php' method='POST'>"."<input type='hidden' name='id' value='".$linha['id'].
					"'><input type='submit' name='botao' value='Excluir'></form>"."</td>";

				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>
</body>
</html>