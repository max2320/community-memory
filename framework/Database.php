<?php

class Database {

	private $cnx;

	public function __construct(){
		global $DB_DSN, $DB_USER, $DB_PASS;

		$DB_DSN = "mysql:dbname=papaburger;host=localhost;port=3306";
		$DB_USER = "root";
		$DB_PASS = "";

		$this->cnx = new PDO($DB_DSN, $DB_USER,	$DB_PASS);
		$this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function querySql($sql){
		return $this->cnx->query($sql);
	}

	public function executeSql($sql){
		return $this->cnx->query($sql);
	}

	public function insert($table, $fields, $datas){
		return $this->executeSql("INSERT INTO {$table}(". implode(',',$fields).") VALUES ('". implode("','",$datas)."');");
	}

	public function update($table, $fields, $datas, $where){
		$updateQuery = [];
		foreach($fields as $id => $field){
			array_push($updateQuery, "{$field} = '{$datas[$id]}'");
		}
		$updateQuery = implode(',',$updateQuery);
		return $this->executeSql("UPDATE {$table} SET {$updateQuery} WHERE $where");
	}

	public function delete($table, $id){
		return $this->executeSql("DELETE FROM {$table} WHERE id = {$id}");
	}

	public function select($table, $fields, $where){
		return $this->querySql("SELECT {$fields} FROM {$table} {$where}");
	}

}

?>
