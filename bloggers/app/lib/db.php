<?php

class WWDB {

	protected $DBCONNECT;

    public function __construct($dbname, $dbuser, $dbpassword) {
        $this->DBCONNECT =  new PDO('mysql:host=localhost;dbname='.$dbname.';charset=UTF8',
        							$dbuser,
        							$dbpassword
        							/*, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")*/
        							/*, array(PDO::ATTR_PERSISTENT => true)*/);
         //uncomment MYSQL_ATTR_INIT_COMMAND to set defalt names in utf8
         //uncomment ATTR_PERSISTENT to lower number of connections
        $this->DBCONNECT->query("SET NAMES utf8");
    }

	// execute query and returns result
	// param $query must be string
	function dbQuery($query) {
		return $this->DBCONNECT->query($query);
	}

	// execute query and returns result
	function dbExecute($query) {
		$sh = $this->DBCONNECT->prepare($query);
		return $sh->execute();
	}


	function dblastInsertId() {
		return $this->DBCONNECT->lastInsertId();

	}
	// execute query and returns one column result
	// param $query must be string
	function dbFetchColumn($query, $column = 0) {
		return $this->dbQuery($query)->fetchColumn($column);
	}

	// execute query and returns row as object
	// param $query must be string
	function dbFetchObject($query) {
		return $this->dbQuery($query)->fetchObject();
	}

	// execute query and returns an array containing all of the result set rows
	// param $query must be string
	function dbFetchAll($query) {
		return $this->dbQuery($query)->fetchAll();
	}

	// execute query and returns number of rows in table with optional condition
	// param $table must be string
	// param $condition must be string
	function dbRowCount($table, $condition='') {
		if(!empty($condition))
			$count = $this->dbQuery('SELECT COUNT(*) FROM '.$table.' WHERE '.$condition)->fetchAll();
		else
			$count = $this->dbQuery('SELECT COUNT(*) FROM '.$table)->fetchAll();
		return $count[0][0]; // zero key of first array has our count result
	}

	// execute query and returns id of fist element in table
	// param $table must be string
	function dbFirstTableID($table) {
		return $this->dbFetchObject('SELECT id FROM '.$table.' ORDER BY id ASC LIMIT 1')->id;
	}

	// execute query and returns id of last element in table
	// param $table must be string
	function dbLastTableID($table) {
		return $this->dbFetchObject('SELECT id FROM '.$table.' ORDER BY id DESC LIMIT 1')->id;
	}

}
?>