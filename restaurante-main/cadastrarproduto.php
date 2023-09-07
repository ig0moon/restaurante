<?php
	require_once 'cabecalho.php'
?>

	<form action="cadastrarproduto.php" method="POST" enctype="multipart/form-data" class="normal">
		<h1>Cadastrar Produto</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" required></p>
		<p>Descrição:</p>
		<p><textarea name="descricao" rows="5" cols="100"></textarea></p>
		<p>Valor R$:</p>
		<p><input type="text" name="valor" maxlength="7" pattern="[0-9,.]{1,5}[0-9]{2}" placeholder="99,99" required></p>

		<p><input type="file" name="imagem" ></p>
		<p><input class="logar" type="submit" name="botao" value="Cadastrar"></p>
	</form>

<?php

	if (isset($_POST['botao'])){
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();

		$produto->setNome($_POST['nome']);
		$produto->setDescricao($_POST['descricao']);
		$produto->setValor($_POST['valor']);
		$produto->setValor(str_replace(",",".",$produto->getValor()));
		$id=$produtopa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$produto->setId($id);
		$imagem=$_FILES['imagem']['tmp_name'];
		$imagem=addslashes(file_get_contents($imagem));
		$produto->setImagem($imagem);

		$resp=$produtopa->cadastrar($produto);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Produto cadastrado com sucesso!</h2>";
		}
	}

?>