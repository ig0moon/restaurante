<?php
	require_once 'cabecalho.php'
?>

	<form action="login.php" method="POST" enctype="multipart/form-data" class="normal">
		<h1>Login</h1>

		<p>Nome:</p>
		<p><input type="text" name="nome" maxlength="25" required></p>
		<p>CPF:</p>
		<p><input type="text" name="cpf" maxlength="11" required></p>

		<p><input class="logar" type="submit" name="botao" value="Logar"></p>
	</form>

<?php
	if (isset($_POST['botao'])) {
		require_once 'persistence/ClientePA.php';
		$clientepa=new ClientePA();
		$cliente=$_POST['nome'];

		$resp=$clientepa->logar($_POST['nome'], $_POST['cpf']);
		
		if (!$resp) {
			echo "<h2>Login Incorreto!</h2>";
		}else{
			//setcookie("cliente",$_POST['cpf'],time()+172800);
			setcookie("cliente",$_POST['cpf']);
			echo "<div id='entrar'>";
			echo "<h2>Login com sucesso!</h2>";
			echo "<a href='administracao.php'>Entrar</a>";
			echo "</div>";
		}
	}
?>

</body>
</html>