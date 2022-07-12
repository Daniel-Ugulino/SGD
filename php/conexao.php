<?php
	class conexao_banco{
		//Variaveis para acesso ao banco
		private $host="10.6.64.10";
		private $banco="Med_Sys";
		private $usuario="postgres";
		private $senha="!f@jW&b!";
		public $conexao;

		public function conectar(){
			$this->conexao=null;
			try{
				$this->conexao=new PDO("pgsql:host=".$this->host.";dbname=".$this->banco,$this->usuario,$this->senha);
				$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $mensagem){
				echo "Erro de conexão: ".$mensagem->getMessage();
			}
			return $this->conexao;
		}
		public function fechar_conexao() {
			$this->conexao=null;
		}
	}
?>