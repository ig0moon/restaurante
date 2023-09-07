<?php
	require_once 'Banco.php';

	class ItemPA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

		public function cadastrar($item){
			$sql="insert into item values(".
			$item->getId().",".$item->getPedido().",".$item->getProduto().",".$item->getQuantidade().")";
 
			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id) from item";
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