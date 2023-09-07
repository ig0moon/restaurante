<?php
require_once 'cabecalho.php';
?>

<section class="topo">
	<div id="logo">
		<a href="index.php">
			<img src="img/icone.jpg">
		</a>
	</div>

	<div id="nome">
		<h1><span>B</span>urger <span>M</span>aster&reg;</h1>
	</div>

	<div id="busca">
		<form class="busca" action="busca.php" method="GET" 
		target="quadro">
			<input type="search" name="busca">
			<input type="submit" name="botao" value="&#128269;">
		</form>
	</div>

	<div id="links">
		<ul class="nav">

	<?php
	if (isset($_COOKIE['admin'])) {
		echo "<li><a href='administracao.php' class='admin'><span class='material-symbols-outlined'>admin_panel_settings</span></a></li>	<!-- admin -->";
		echo "<li><a href='sairadm.php'><span class='material-symbols-outlined'>logout</span></a></li>										<!-- sair -->";

	} else if (isset($_COOKIE['cliente'])) {
		echo "<li class='cpf'>CPF: ".$_COOKIE['cliente']."</li>";
		echo "<li><a href='sair.php'><span class='material-symbols-outlined'>logout</span></a></li>											<!-- sair -->";
		echo "<li><a href='carrinho.php' target='quadro'><span class='material-symbols-outlined'>shopping_cart</span></a></li>				<!-- cart -->";

	} else{
		echo "<li><a href='login.php'><span class='material-symbols-outlined'>login</span></a></li>											<!-- entrar -->";
		echo "<li><a href='cadastrarcliente.php' target='quadro'><span class='material-symbols-outlined'>person_add</span></a></li>			<!-- cadast -->";
		echo "<li><a href='administracao.php' class='admin'><span class='material-symbols-outlined'>admin_panel_settings</span></a></li>	<!-- admin -->";
		}				
	?>

		</ul>
	</div>

</section>

<section class="conteudo">
	<iframe src="home.php" id="quadro" name="quadro"></iframe>
</section>

<section class="rodape">
	<div id="sobre">
		<p>Burger Master&reg;</p>
		<p>Rua X de Y, 99</p>
		<p>Ponta Grossa-PR</p>
		<p>&#9743;(42) 3232-7777</p>
	</div>

	<div id="desenvolvida">
		<p>Desenvolvida no SENAC-PG&trade;</p>
	</div>
</section>

</body>
</html>