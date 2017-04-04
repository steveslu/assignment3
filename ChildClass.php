<?php 
	// this file will extend PArentClass.php

	class ChildClass extends ParentClass {
		public function __construct($t1, $t2, $coin){
			parent::__construct($t1, $t2, $coin);
		}
		
		public function runPlay(){
			$play=rand(0,1);
			$to=rand(0,20);
			if($this->down<=3){
				if($play=0){
					$y=rand(15,40)-rand(0,25); 
					$this->pass($y,$to);
				}else{
					$y=rand(10,25)-rand(0,18); 
					$this->run($y,$to);
				}
			}else if($this->down==4 && $this->yardsToTD<=32){
				$fg=rand(0,40);
				$this->fieldgoal($fg);
			}else{
				$this->turnover();
			}
	
		}
		
		public static function secondHalf($save) {
			
			echo "BEGIN SECOND HALF.<br><br></div><br><br>";
			$game = unserialize($save);
			return $game;
		}
		
		public function halftime() {
			echo "</div><br>";
			echo "<div class='half'>";
			echo "<br><br>";
			echo "Going into the half with the score " . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore . " <br>";
			echo "<br><br>";
			return serialize($this);
		}
		
		
		
		function __destruct(){
			echo "<span class='rain'>Game Over! See you next time!</span><br>";
		}

		
	}
