<?php
require_once 'cabecalho.php';
?>

<form class="normal" action="login_admin.php" method="POST">
	<h1>Login Administrador</h1>

	<p>Usuário:</p>
	<p><input type="text" name="usuario" size="19" maxlength="20" pattern="[0-9a-zA-Z_]{1,20}" required></p>

	<p>Senha:</p>
	<p><input type="password" name="senha" size="20" maxlength="10" pattern="[0-9a-zA-Z_\s@]{1,10}" required></p>

	<p><input class="logar" type="submit" name="botao" value="Logar"></p>

</form>

<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Usuario.php';
		require_once 'persistence/UsuarioPA.php';
		$usuario=new Usuario();
		$usuariopa=new UsuarioPA();

		$usuario->setUsuario($_POST['usuario']);
		$usuario->setSenha($_POST['senha']);
		$resp=$usuariopa->logar(
			$usuario->getUsuario(),$usuario->getSenha());
		
		if($resp){
			echo "<h2>Bem vindo ".
			$usuario->getUsuario()."!</h2>";
			setcookie("admin",$usuario->getUsuario());

			echo "<div id='entrar'>";
			echo "<a href='administracao.php'>Entrar</a>";
			echo "</div>";
			
		}else{
			echo "<h2>Login Incorreto!</h2>";
		}
	}
?>

</body>
</html>