<?php 

include 'class/config.php';

class Database{	
	
	private static $pdo;

	public static function conn(){
		if (!isset(self::$pdo)) {
			try {
				self::$pdo = new PDO('mysql:dbhost='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
			} catch (PDOException $e) {
				echo "Connection failed...".$e->getMessage();
			}
		}
		return self::$pdo;
	}

	public static function prepare($sql){
		return self::conn()->prepare($sql);
	}
	
}

?>