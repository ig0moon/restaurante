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

		<div id="none">
		</div>

		<div id="links">
			<ul class="nav">
				<li><a href="cadastrarproduto.php" target="quadro"><span class="material-symbols-outlined">add_box</span></a></li>			<!-- cadastrar -->
				<li><a href="listarproduto.php" target="quadro"><span class="material-symbols-outlined">density_medium</span></a></li>		<!-- listar prod -->
				<li><a href="listarpedido.php" target="quadro"><span class="material-symbols-outlined">receipt_long</span></a></li>			<!-- listar ped -->
				<li><a href="alterarproduto.php" target="quadro"><span class="material-symbols-outlined">rule_settings</span></a></li>		<!-- alterar -->
				<li><a href="gerenciarusuario.php" target="quadro"><span class="material-symbols-outlined">manage_accounts</span></a></li>	<!-- gerenciar -->
				<li><a href="sairadm.php"><span class="material-symbols-outlined">logout</span></a></li>									<!-- sair -->
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