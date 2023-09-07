<?php
	require_once 'cabecalho.php';

	if (isset($_POST['botao'])&&isset($_POST['id'])){
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();

		$consulta=$produtopa->buscarPorId($_POST['id']);
		if (!$consulta){
			echo "<h2>Nenhum produto encontrado.</h2>";
		} else{
			while ($linha=$consulta->fetch_assoc()){
				$produto->setId($linha['id']);
				$produto->setNome($linha['nome']);
				$produto->setDescricao($linha['descricao']);
				$produto->setValor($linha['valor']);
				$produto->setImagem($linha['imagem']);
			}
		}

?>
		<form action="alterar.php" method="POST" enctype="multipart/form-data" class="normal">

		<h1>Alterar Produto</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" value="<?= $produto->getNome() ?>"></p>

		<p>Descrição:</p>
		<p><textarea name="descricao" rows="5" cols="100"> <?= $produto->getDescricao() ?></textarea></p>

		<p>Valor R$:</p>
		<p><input type="text" name="valor" maxlength="7" pattern="[0-9,.]{1,5}[0-9]{2}" value="<?= $produto->getValor() ?>"></p>

		<p>Imagem:</p>
		<p><img src="data:image/jpg;base64,<?= base64_encode($produto->getImagem())?>" style="width: 150px; height: 150px;"></p>
		<p><input type="file" name="imagem"></p>
		<input type="hidden" name="idalt" value="<?= $produto->getId() ?>">
		<input type="hidden" name="imagemo" value="<?= addcslashes($produto->getImagem()) ?>">

		<p><input type="submit" name="botao" value="Alterar"></p>

	</form>

<?php
		}

	if (isset($_POST['botao'])&&isset($_POST['idalt'])){
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();

		$consulta=$produtopa->buscarPorId($_POST['idalt']);
		if (!$consulta){
			echo "<h2>Nenhum produto encontrado.</h2>";
		} else {
			if ($_FILES['imagem']['tmp_name']!=""){
				$imagem=$_FILES['imagem']['tmp_name'];
				$imagem=addslashes(file_get_contents($imagem));
				$produto->setImagem($imagem);
			} else {
				$linha=$consulta->fetch_assoc();
				$produto->setImagem(addslashes($linha['imagem']));
			}
			$produto->setId($_POST['idalt']);
			$produto->setNome($_POST['nome']);
			$produto->setDescricao($_POST['descricao']);
			$produto->setValor($_POST['valor']);
			$produto->setValor(str_replace(",",".", $produto->getValor()));
			$resp=$produtopa->alterar($produto);
			if (!$resp){
				echo "<h2>Erro ao tentar alterar.</h2>";
			} else{
				echo "<h2>Produto alterado com sucesso.</h2>";
			}
		}
	}

?>