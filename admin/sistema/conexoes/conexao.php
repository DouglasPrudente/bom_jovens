<?php
include 'sistema/configuracoes/base.php';
class Conexao extends Base{
	private $dbh;
	private $error;
	private $stmt;

	public function __construct(){
		// Set DSN
		$dsn = 'mysql:host='. $this->hospedagem . ';dbname='. $this->base;
		// Set Options
		$options = array(
			PDO::ATTR_PERSISTENT		=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
		);
		// Create new PDO
		try {
			$this->dbh = new PDO($dsn, $this->usuario, $this->senha, $options);
		} catch(PDOEception $e){
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function ligar($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function executar(){
		return $this->stmt->execute();
	}

	public function lastInsertId(){
		$this->dbh->lastInsertId();
	}

	public function recebe_resultado(){
		$this->executar();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function conta_resultado(){
		$this->executar();
		return $this->stmt->rowCount();
	}
}