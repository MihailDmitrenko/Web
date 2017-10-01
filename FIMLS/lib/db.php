<?php 

class Database 
{
	private $connection;
	private static $instance; // одиночный обьект
	private $host = "127.0.0.1";
	private $username = "root";
	private $password = "root";
	private $database = "test";
	
	public static function getInstance() 
	{
		if(!self::$instance) { // если нет обьекта создаем его
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	private function __construct() 
	{
		$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
		
		if ($mysqli->connect_errno) {
			printf("Не удалось подключиться: \n", $mysqli->connect_error);
			exit();
		}
	}
	// магический метод clone пустой, чтобы избежать дублирования
	private function __clone() { }
	
	public function getConnection() 
	{
		return $this->connection;
	}
}
