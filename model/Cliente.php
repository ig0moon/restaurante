<?php
	
	class Cliente{
		private $id;
		private $nome;
		private $cpf;
		private $endereco;
		private $bairro;
		private $telefone;

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setCpf($cpf){
			$this->cpf=$cpf;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setEndereco($endereco){
			$this->endereco=$endereco;
		}

		public function getEndereco(){
			return $this->endereco;
		}
		
		public function setBairro($bairro){
			$this->bairro=$bairro;
		}

		public function getBairro(){
			return $this->bairro;
		}
		
		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}

		public function getTelefone(){
			return $this->telefone;
		}
		
	}

?>