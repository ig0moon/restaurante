<?php
	require_once 'cabecalho.php';

	if (isset($_COOKIE['carrinho'])) {
		$produtos=unserialize($_COOKIE['carrinho']);
		require_once 'persistence/ProdutoPA.php';
		$produtopa=new ProdutoPA();

		echo "<table>";
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Nome</th>";
		echo "<th>Descrição</th>";
		echo "<th>Valor</th>";
		echo "<th>Imagem</th>";
		echo "<th>Quantidade</th>";
		echo "</tr>";

		echo "<form action='finalizar.php' method='POST'>";
		$cont=0;
		foreach ($produtos as $linha) {
			echo "<tr>";
			foreach ($linha as $coluna=>$valor) {
				if ($coluna==0) {
					$id=$valor;
				}
				if ($coluna==3) {
					echo "<td>$valor</td>";
					$consulta=$produtopa->buscarPorId($id);
					$linha=$consulta->fetch_assoc();
					echo "<td><img src='data:image/jpg;base64,".base64_encode($linha['imagem'])."'></td>";
				} else {
				echo "<td>$valor</td>";
				}
			}
			echo "<td><input type='number' name='quant$cont' min='1' max='10' value='1'></td>";
			echo "<input type='hidden' name='id$cont' value='$id'>";
			echo "</tr>";
			$cont++;
		}
		echo "</table>";
		echo "<section><input type='submit' value='Confirmar' name='botao'></section>";
		echo "</form>";
	} else {
		echo "<h2>Adicione produtos ao carrinho primeiro.</h2>";
	}
?>
</body>
</html>