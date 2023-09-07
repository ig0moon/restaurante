<?php
	require_once 'Banco.php';

	class ClientePA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

	public function cadastrar($cliente){
			$sql="insert into cliente values(".
			$cliente->getId().",'".
			$cliente->getNome()."',".
			$cliente->getCpf().",'".
			$cliente->getEndereco()."','".
			$cliente->getBairro()."','".
			$cliente->getTelefone()."')";

			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id) from cliente";
			$consulta=$this->conexao->consultar($sql);
			if (!$consulta){
				return false;
			} else{
				$linha=$consulta->fetch_assoc();
				$id=0;
				if($linha['max(id)']!=null){
					$id=$linha['max(id)'];
				}
				return $id;
			}
		}

		public function logar($nome,$cpf){
			$sql="select nome,cpf from cliente";
			$consulta=$this->conexao->consultar($sql);
			if (!$consulta){
				return false;
			} else {
				$teste=false;
				while ($linha=$consulta->fetch_assoc()){
					if ($linha['nome']==$nome){
						if ($linha['cpf']==$cpf){
							return true;
						}
					}
				}
				return $teste;
			}
		}

		public function retornarId($cpf){
			$sql="select id from cliente where cpf=$cpf";
			return $this->conexao->consultar($sql);
		}

	}
?>