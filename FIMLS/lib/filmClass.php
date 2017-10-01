<?php

require_once "db.php";

class Film
{
	public $id;
	public $title;
	public $year;
	public $format;
	public $actors;
	public $lists;
	public $result; // getlists

	public function addFilm() 
	{
		//  добавление фильма в базу		
		$db = Database::getInstance();
		$mysqli = $db->getConnection(); 
		$sql_query = "INSERT INTO `films`(`id`, `title`, `year`, `format`, `actors`) 
		VALUES (NULL, `test`, `test`, `test`, `test`)";
		$result = $mysqli->query($sql_query);

		if ($result = $mysqli->query("INSERT INTO `films`(`id`, `title`, `year`, `format`, `actors`) 
		VALUES (NULL, 'test', 'test', 'test', 'test')")) {
			
		}
	}


	public function delFilm($title)
	{
		// удаление фильма
		$db 		= Database::getInstance();
		$mysqli 	= $db->getConnection(); 
		$sql_query  = "DELETE FROM `test`.`films` WHERE `films`.`title` = '$title'";
		$result 	= $mysqli->query($sql_query); // bool
		if ($result = $mysqli->query("DELETE FROM `test`.`films` WHERE `films`.`title` = '$title'")) {
		
		}
	}

	public function getInfo($title)
	{
		// получение информации по имени фильма с базы данных
		if ($_GET['name'] == null) {
			echo "Введите название фильма";
		} else { 
			$this->title = $_GET['name'];
		}
		
		// вывод информации о фильме
		$db 		= Database::getInstance();
		$mysqli 	= $db->getConnection(); 
		$sql_query 	= "SELECT * FROM `test`.`films` WHERE `films`.`title` = '$this->title'";
		$result 	= $mysqli->query($sql_query);

		if ($result = $mysqli->query("SELECT * FROM `test`.`films` WHERE `films`.`title` = '$this->title'")) {
			while ($row = $result->fetch_assoc()) {
        	return array ( 
        	$this->id 	  = $row['id'],
        	$this->title  = $row['title'],
        	$this->year   = $row['year'],
        	$this->format = $row['format'],
        	$this->actors = $row['actors'] );
  			}
		}
	}

	public function getLists()
	{
		// получение списка фильмов (отсортиров.)
		if (!$_GET['getlists'] == null) {
			$this->films = $_GET['getlists'];
		} 
		
		// вывод информации о фильме
		$db 		= Database::getInstance();
		$mysqli 	= $db->getConnection(); 
		$sql_query 	= "SELECT * FROM `test`.`films` ORDER BY 'title'";
		$result 	= $mysqli->query($sql_query);

		if ($result = $mysqli->query("SELECT * FROM `test`.`films` ORDER BY 'title'")) {
		// определение числа рядов в выборке 
   			 $row_cnt = $result->num_rows;
   			 $row = $result->fetch_assoc();
   			 return array (
   			 	$this->lists = $row_cnt,
   			 	$this->result = $row
   			);
		}
	}

	public function getFilm()
	{
		// поиск фильма по названию, по имени актера
		if ($_GET['nameActor'] == null) {
			echo "Введите название фильма";
		} else { 
			$this->title = $_GET['nameActor'];
		}
		
		// вывод информации о фильме
		$db 		= Database::getInstance();
		$mysqli 	= $db->getConnection(); 
		$sql_query 	= "SELECT * FROM `test`.`films` WHERE `films`.`actors` = '$this->actors'";
		$result 	= $mysqli->query($sql_query);

		if ($result = $mysqli->query("SELECT * FROM `test`.`films` WHERE `films`.`actors` = '$this->actors'")) {
			while ($row = $result->fetch_assoc()) {
        	return array ( 
        	$this->id 	  = $row['id'],
        	$this->title  = $row['title'],
        	$this->year   = $row['year'],
        	$this->format = $row['format'],
        	$this->actors = $row['actors'] );
  			}
		}
	}

	public function importFile()
	{
		// иморт файлов с файла .txt в БД
	}
	
	public function parseFile() 
	{
		$file = file_get_contents(__DIR_ . "\..\sample_movies.txt"); 	// return string	
		$expEnter = explode("\n", $file); 								// return array

		foreach ($expEnter as $line1) {
			$expDots = explode(": ", $line1);
			foreach ($expDots as $line2) {

				 // $clean = str_replace("Title", "", $line2);
				 // $clean = str_replace("Release Year", "", $clean);
				 // $clean = str_replace("Format", "", $clean);
				 // $clean = str_replace("Stars", "", $clean);	

			}
		}
	}
}
