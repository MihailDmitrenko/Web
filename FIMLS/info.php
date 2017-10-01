<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="lib/style.css">
</head>
<body>
	<div class="container">
		<h3>Показать информацию о фильме:</h3>
		<h6>(по названию)</h6>
		<form action="index.php" method="GET" name="getinfo">
			<input type="text" name="name" placeholder="Введите название фильма...">
			<input type="submit" value="Получить">
		</form>
		<h5>ID Film: 
			<?php echo $film->id;  ?>		
		</h5>
		<h5>Title: 
			<?php echo $film->title;  ?>
		</h5>
		<h5>Release Year: 
			<?php echo $film->year;  ?>
		</h5>
		<h5>Format: 
			<?php echo $film->format;  ?>
		</h5>
		<h5>Actors: 
			<?php echo $film->actors;  ?>
		</h5>

		<hr><br>

		<h3>Получить список всех фильмов:</h3>
		<form action="index.php" method="GET" name="getlists">
			<input type="submit" value="Узнать">
		</form>
		
		<?php 
			for	($i = 0; $i <= $film->lists; $i++) {
			echo "<h5>Title: {$film->result[$i]} </h5> ";			
			}
		?>
</div>
</body>
</html>