<?php
	
	class Pedido{
		private $id;
		private $cliente;
		private $data;
		private $valor;

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setCliente($cliente){
			$this->cliente=$cliente;
		}

		public function getCliente(){
			return $this->cliente;
		}

		public function setData($data){
			$this->data=$data;
		}

		public function getData(){
			return $this->data;
		}

		public function setValor($valor){
			$this->valor=$valor;
		}

		public function getValor(){
			return $this->valor;
		}
	}
?>