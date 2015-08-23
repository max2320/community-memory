<?php

class Database {

	private $cnx;

	public function __construct(){
		global $DB_DSN, $DB_USER, $DB_PASS;
		var_dump($DB_DSN);
		$this->cnx = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'],	$GLOBALS['DB_PASS']);
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
