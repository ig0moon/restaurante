<?php
	require_once 'cabecalho.php';
?>

<?php
	if (isset($_GET['botao'])){
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();

		$consulta=$produtopa->buscar($_GET['busca']);

		if (!$consulta){
			echo "<h2>Nenhum produto encontrado.</h2>";
		} else{
			echo "<table>";
			echo "<tr>";
			if (isset($_COOKIE['cliente'])){
				echo "<th></th>";
			}
			echo "<th>Nome</th>";
			echo "<th>Descrição</th>";
			echo "<th>Valor R$</th>";
			echo "<th>Imagem</th>";
			echo "</tr>";

			while ($linha=$consulta->fetch_assoc()){
				echo "<tr>";
				if (isset($_COOKIE['cliente'])){
					echo "<td><form action='carrinho.php' method='POST'>";
						echo "<input type='hidden' name='id' value='".$produto->getId()."'>";
						echo "<p><input class='cart' type='submit' name='botao' value='Adicionar ao carrinho'></p>";
						echo "</form>";
					echo "</td>";
				}
				echo "<td>".$linha['nome']."</td>";
				echo "<td>".$linha['descricao']."</td>";
				echo "<td>".$linha['valor']."</td>";
				echo "<td><img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'></td>";
			}
		}
	}