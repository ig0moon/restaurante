<?php
	require_once 'Banco.php';

	class PedidoPA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

		public function cadastrar($pedido){
			$sql="insert into pedido values(".
			$pedido->getId().",".
			$pedido->getCliente().",'".
			$pedido->getData()."',".
			$pedido->getValor().")";
			// var_dump($sql);
			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id) from pedido";
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
	}
?>