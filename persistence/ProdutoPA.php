<?php
	require_once 'Banco.php';

	class ProdutoPA{
		private $conexao;

		function __construct(){
			$this->conexao=new Banco();
		}

		public function cadastrar($produto){
			$sql="insert into produto values(".
			$produto->getId().",'".
			$produto->getNome()."','".
			$produto->getDescricao()."',".
			$produto->getValor().",'".
			$produto->getImagem()."')";

			// echo "$sql";
		return $this->conexao->executar($sql);
		}

		public function retornarUltimo(){
			$sql="select max(id) from produto";
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

		public function listar($inicio,$fim){
			$sql="select * from produto where id between $inicio and $fim";
			return $this->conexao->consultar($sql);
		}

		public function buscarPorId($id){
			$sql="select * from produto where id=$id";
			return $this->conexao->consultar($sql);
		}

		public function buscar($busca){
			$sql="select * from produto where id='$busca' or nome like '%$busca%' or descricao like '%$busca%'";
			return $this->conexao->consultar($sql);
		}

		public function alterar($produto){
			$sql="update produto set nome='".$produto->getNome()."', descricao='".$produto->getDescricao()."', valor=".$produto->getValor().", imagem='".$produto->getImagem()."' where id=".$produto->getId();
			// echo "$sql";
			return $this->conexao->executar($sql);	
		}

		public function excluir($id){
			$sql="delete from produto where id=$id";
			return $this->conexao->executar($sql);
		}
	}