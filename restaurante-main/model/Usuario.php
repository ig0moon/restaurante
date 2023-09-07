<?php
	
	class Usuario{
		private $id;
		private $usuario;
		private $senha;

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}

		public function getUsuario(){
			return $this->usuario;
		}

		public function setSenha($senha){
			$this->senha=md5($senha);
		}

		public function getSenha(){
			return $this->senha;
		}
		
	}

?>