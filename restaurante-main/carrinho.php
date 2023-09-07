<?php
require_once 'cabecalho.php';


if(isset($_POST['botao'])&&isset($_POST['id'])){
	if(!isset($_COOKIE['carrinho'])){
		$produtos=array(array());
		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();
		$consulta=$produtopa->buscarPorId($_POST['id']);
		if(!$consulta){
			echo "<h2>Produto não existe!</h2>";
		}else{
			$linha=$consulta->fetch_assoc();
			$produto->setId($linha['id']);
			$produto->setNome($linha['nome']);
			$produto->setDescricao($linha['descricao']);
			$produto->setValor($linha['valor']);

			$id=$produto->getId();
			$nome=$produto->getNome();
			$descricao=$produto->getDescricao();
			$valor=$produto->getValor();
			
			$produtos[0][0]=$id;
			$produtos[0][1]=$nome;
			$produtos[0][2]=$descricao;
			$produtos[0][3]=$valor;
			setcookie("carrinho",serialize($produtos));
			header('Location: carrinho.php');

		}
	}else{
		$produtos=unserialize($_COOKIE['carrinho']);

		require_once 'model/Produto.php';
		require_once 'persistence/ProdutoPA.php';
		$produto=new Produto();
		$produtopa=new ProdutoPA();
		$consulta=$produtopa->buscarPorId($_POST['id']);
		if(!$consulta){
			echo "<h2>Produto não existe!</h2>";
		}else{
			$linha=$consulta->fetch_assoc();
			$produto->setId($linha['id']);
			$produto->setNome($linha['nome']);
			$produto->setDescricao($linha['descricao']);
			$produto->setValor($linha['valor']);

			$id=$produto->getId();
			$nome=$produto->getNome();
			$descricao=$produto->getDescricao();
			$valor=$produto->getValor();

			$tamanho=count($produtos);
			$produtos[$tamanho][0]=$id;
			$produtos[$tamanho][1]=$nome;
			$produtos[$tamanho][2]=$descricao;
			$produtos[$tamanho][3]=$valor;
			setcookie("carrinho",serialize($produtos));
			header('Location: carrinho.php');
		}
	}
}

if(isset($_POST['coluna'])){
	$produtos=unserialize($_COOKIE['carrinho']);
	if (count($produtos)<=1){
		setcookie("carrinho","");
		header('Location: carrinho.php');

	}else {
	unset($produtos[$_POST['coluna']]);
	setcookie("carrinho",serialize($produtos));
	header('Location: carrinho.php');
	}
}


if(!isset($_COOKIE['carrinho'])){
	echo "<h2>O carrinho está vazio!</h2>";
}else{

	echo "<section class='titulo_car'><h1>Carrinho</h1></section>";
	$produtos=unserialize($_COOKIE['carrinho']);
	require_once 'persistence/ProdutoPA.php';
	$produtopa=new ProdutoPA();
	$cont=0;
	//echo "<form action='comprar.php' method='POST'>";
	foreach($produtos as $linhas){
		echo "<section class='carrinho'>";
		foreach ($linhas as $coluna=>$valor) {
			if($coluna==0){
				echo "<div class='conteudo_car'><input type='hidden'
				name='id$cont' value='$valor'>$valor</div>";
				$consulta=$produtopa->buscarPorId($valor);
				$linha=$consulta->fetch_assoc();
				echo "<div class='conteudo_car'><img src='data:image/jpg;base64,".
				base64_encode($linha['imagem'])."' class='img_car'></div>";
			}else{
				echo "<div class='conteudo_car'>$valor</div>";
			}
		}
		/*echo "<div class='conteudo_car'><p>Quantidade:</p>";
		echo "<input type='number' name='quant$cont'
		min='1' max='20' value='1' required></div>";
		echo "<section><input type='submit' name='botao' 
		value='Comprar'></section>";
		echo "</form>";*/
		echo "<div><form action='carrinho.php' method='POST'>";
		echo "<input type='hidden' name='coluna' value='$cont'>";
		echo "<input type='submit' value='Remover'></form></div>";
		echo "</section>";
	}

	echo "<section><a href='comprar.php'>Comprar</a></section>";
	
}



?>
</body>
</html>