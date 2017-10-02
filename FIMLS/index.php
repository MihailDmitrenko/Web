<?php

require_once __DIR__ . "/lib/filepars.php";
require_once __DIR__ . "/lib/filmClass.php";
require_once __DIR__ . "/lib/db.php";

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<?php 	
		$film = new Film();
		$film->addFilm();
		$film->getInfo(test);
		$film->getLists();
		
		require_once __DIR__ . "/info.php";
	?>
</body>
</html>
