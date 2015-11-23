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

	private function run($sql){
		return $this->pdo->exec($sql);
	}
	
	public function query($sql){
		return $this->pdo->query($sql);	
	}

	public function insert($table, $fields, $datas){
		return $this->run("INSERT INTO {$table} (". implode(',',$fields).") VALUES ('". implode("','",$datas)."');");
	}

	public function update($table, $fields, $datas, $where){
		var_dump($fields);
		$updateQuery = [];

		foreach($datas as $field => $value){
			array_push($updateQuery, "{$field} = '{$value}'");
		}

		$updateQuery = implode(',',$updateQuery);

		return $this->run("UPDATE {$table} SET {$updateQuery} WHERE $where");
	}

	public function delete($table, $id){
		return $this->run("DELETE FROM {$table} WHERE id = {$id}");
	}

	public function select($table, $where = "", $fields = "*", $ordination = 'id'){
		$rs = $this->query("SELECT {$fields} FROM {$table} WHERE {$where} ORDER BY {$ordination}");
		return $rs;
	}

}

?>
