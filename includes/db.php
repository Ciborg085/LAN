<?php
class DB {

	private static function connect(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=lan;charset=utf8', 'root','');
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()){
		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		// $data = $statement->fetchAll();
		// return $data;
	}
}
?>
	
	