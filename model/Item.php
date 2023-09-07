<?php
	
	class Item{
		private $id;
		private $pedido;
		private $produto;
		private $quantidade;

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setPedido($pedido){
			$this->pedido=$pedido;
		}

		public function getPedido(){
			return $this->pedido;
		}

		public function setProduto($produto){
			$this->produto=$produto;
		}

		public function getProduto(){
			return $this->produto;
		}

		public function setQuantidade($quantidade){
			$this->quantidade=$quantidade;
		}

		public function getQuantidade(){
			return $this->quantidade;
		}
	}

?>