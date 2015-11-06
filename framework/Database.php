<?php

class Database {

	private $pdo;

	public function __construct(){
		global $DB_DSN, $DB_USER, $DB_PASSWORD;

		$this->pdo = new PDO($DB_DSN, $DB_USER,	$DB_PASSWORD);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	private function prepare($sql){
		$this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));	
	}

	private function run(){
		return $this->pdo->exec();
	}
	
	public function query($sql){
		return $this->pdo->query($sql);	
	}


	public function insert($table, $fields, $datas){
		echo "INSERT INTO {$table} (". implode(',',$fields).") VALUES ('". implode("','",$datas)."');";
		$this->prepare("INSERT INTO {$table} (". implode(',',$fields).") VALUES ('". implode("','",$datas)."');");

		return $this->run();
	}

	public function update($table, $fields, $datas, $where){
		$updateQuery = [];

		foreach($fields as $id => $field){
			array_push($updateQuery, "{$field} = '{$datas[$id]}'");
		}

		$updateQuery = implode(',',$updateQuery);
		
		$this->prepare("UPDATE {$table} SET {$updateQuery} WHERE $where");

		return $this->run();
	}

	public function delete($table, $id){
		$this->prepare("DELETE FROM {$table} WHERE id = {$id}");
		
		return $this->run();
	}

	public function select($table, $where = "", $fields = "*"){
		$rs = $this->query("SELECT {$fields} FROM {$table} WHERE {$where}");
		return $rs;
	}

}

?>
