<?php
class Conexao{
	private static $user = "root";
	private static $senha = "";
	private static $host = "localhost";
	protected static $conn;
	private function __construct(){
		self::$conn= new PDO('mysql:host=localhost;dbname=comercio', self::$user, self::$senha);
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$conn->exec('SET NAMES utf8');
	
	}
	public static function conexao(){
		if (!self::$conn) {
            		new Conexao();
        	}
        	
        	return self::$conn;
	}
	
}

?>

