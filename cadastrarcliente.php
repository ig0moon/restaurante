<?php
	require_once 'cabecalho.php'
?>

	<form action="cadastrarcliente.php" method="POST" enctype="multipart/form-data" class="normal">
		<h1>Cadastrar Cliente</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" required></p>
		<p>CPF:</p>
		<p><input type="text" name="cpf" maxlength="11" required></p>
		<p>Endereço:</p>
		<p><input type="text" name="endereco" maxlength="50" required></p>
		<p>Bairro:</p>
		<p><input type="text" name="bairro" maxlength="20" required></p>
		<p>Telefone:</p>
		<p><input type="number" name="telefone" maxlength="14" required></p>

		<p><input class="logar" type="submit" name="botao" value="Cadastrar"></p>
	</form>

<?php

	if (isset($_POST['botao'])){
		require_once 'model/Cliente.php';
		require_once 'persistence/ClientePA.php';
		$cliente=new Cliente();
		$clientepa=new ClientePA();

		$cliente->setNome($_POST['nome']);
		$cliente->setCpf($_POST['cpf']);
		$cliente->setEndereco($_POST['endereco']);
		$cliente->setBairro($_POST['bairro']);
		$cliente->setTelefone($_POST['telefone']);
		$id=$clientepa->retornarUltimo();
		if ($id>0){
			$id++;
		} else{
			$id=1;
		}
		$cliente->setId($id);
		
		$resp=$clientepa->cadastrar($cliente);
		if (!$resp){
			echo "<h2>Erro na tentativa de cadastrar! Tente novamente!</h2>";
		} else{
			echo "<h2>Cliente cadastrado com sucesso!</h2>";
		}
	}

?>