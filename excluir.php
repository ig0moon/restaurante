<?php
	require_once 'cabecalho.php';

	if (isset($_POST['botao'])&&isset($_POST['id'])){
		require_once 'persistence/ProdutoPA.php';
		$produtopa=new ProdutoPA();
		$consulta=$produtopa->buscarPorId($_POST['id']);
		if (!$consulta){
			echo "<h2>O produto não existe.</h2>";
		} else{
			echo "<form action='excluir.php' method='POST' class='normal'>";
			$linha=$consulta->fetch_assoc();
			echo "<h1>Excluir</h1>";
			echo "<p>Tem certeza de que deseja excluir ".$linha['nome']." dos produtos?</p>";
			echo "<p><input type='hidden' name='idex' value='".$linha['id']."'>";
			echo "<input type='submit' name='botao' value='Sim'></p>";
			echo "<div id='entrar'><a href='alterarproduto.php'>Não</a></div>";
		}
	}

	if (isset($_POST['botao'])&&isset($_POST['idex'])){
		require_once 'persistence/ProdutoPA.php';
		$produtopa=new ProdutoPA();
		$resp=$produtopa->excluir($_POST['idex']);
		if (!$resp){
			echo "<h2>Erro na tentativa de excluir.</h2>";
		} else{
			echo "<h2>Produto excluído com sucesso!</h2>";
		}
	}

?>