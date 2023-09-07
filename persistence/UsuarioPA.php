<?php
	require_once 'Banco.php';

	class UsuarioPA{
		private $conexao;

		function __construct()
		{
			$this->conexao=new Banco();
		}

		public function logar($usuario,$senha){
			$sql="select usuario,senha from administrador";
			$consulta=$this->conexao->consultar($sql);
			if (!$consulta){
				return false;
			} else{
				while ($linha=$consulta->fetch_assoc()){
					if ($linha['usuario']==$usuario){
						if ($linha['senha']==$senha){
							$teste=true;
							return true;
						} else{
							$teste=false;
						}

						} else{
							$teste=false;
						}
					}
					if ($teste==false){
						return false;
					}
			}
		}
	}
?>