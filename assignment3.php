<?php 
	function __autoload($class) {
		require_once $class . '.php';
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment 3</title>

	<link rel="stylesheet" href="assignment3.css">
</head>
<body>
	<?php
		$teams=['Ravens','Jets','Patriots','Dolphins','Chargers','Cheifs','Jaguars','Colts','Texans','Broncos','Browns','Bengles','Bills',
		'Redskins','Buccaneers','Seahawks','49ers','Eagles','Giants','Saints','Vikings','Rams','Packers','Lions','Cowboys','Bears','Panthers','Falcons','Cardinals','Titans','Steelers','Raiders'];
		$r1=rand(0,31);
		$r2=rand(0,31);
		$rb=rand(0,1);
		echo "<h1> LETS PLAY SOME FOOTBALL!</h1>";
		
		echo "<h2> New game between ". $teams[$r1]. " vs. " . $teams[$r2]. " </h2>";
		$game=new ChildClass($teams[$r1], $teams[$r2], $rb);
		$game->begin();
		for($i=0;$i<60;$i++){
			$game->runPlay();
		}
		$half=$game->halftime();
		$second=ChildClass::secondHalf($half);
		$second->begin();
		
		for($i=0;$i<60;$i++){
			$second->runPlay();
		}
		$second->end();
		
		
	?>
</body>
</html>