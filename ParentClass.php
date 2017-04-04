<?php
	// This is the file for the parent class

	class ParentClass {
		protected $homePos;
		protected $homeTeam;
		protected $awayTeam;
		protected $awayScore;
		protected $homescore;
		protected $yardsToFirst;
		protected $yardsGained;
		protected $result;
		protected $yardsToTD;
		protected $down;
		protected $firstPos;
		
		
		public function __construct($t1, $t2, $possesion){
			$this->homeTeam= $t1;
			$this->awayTeam= $t2;
			$this->homePos=$possesion;
			$this->firstPos=$possesion;
			$this->awayScore=0;
			$this->homeScore=0;
			$this->yardsToFirst=10;
			$this->yardsToTD=75;
			$this->down=1;
			$this->result=null;
		}
		
		public function begin(){
			echo "</div>";
			$this->firstPos=!$this->firstPos;
			$this->homePos=$this->firstPos;
			if($this->firstPos){
				echo "<div class='home'>";
				echo "New Drive ". $this->homeTeam . " ball.<br>";
			}else{
				echo "<div class='away'>";
				echo "New Drive ". $this->awayTeam . " ball.<br>";
			}	
			$this->yardsToTD=rand(65,80)+rand(0,10);
			echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";			
		}
		
		public function pass($y, $to){
			
			
			echo "Ran a PASS play<br>";
			if($to<=1 ){
				
				echo "INTERCEPTION!<br>";
				$this->yardsToFirst=10;
				$this->down=1;
				$this->homePos=!$this->homePos;
				echo "</div> <br><br>";	
				if($this->homePos){
					echo "<div class='home'>";
					echo "New Drive ". $this->homeTeam . " ball.<br>";
				}else{
					echo "<div class='away'>";
					echo "New Drive ". $this->awayTeam . " ball.<br>";
				}	
				$this->yardsToTD=rand(65,80)+rand(0,10);
				echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
								
				
			}else if($to<11 && $to >1){
				$this->down++;
				echo "Incomplete Pass!<br>";
				echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";

			}else{
				
				$this->yardsToTD=$this->yardsToTD-$y;
				$this->yardsToFirst=$this->yardsToFirst-$y;
				$this->down++;
				
				if($this->yardsToTD<=0){
					
					
					if($this->homePos){
						echo "TOUCHDOWN ". $this->homeTeam. "!<br>";
						$this->homeScore=$this->homeScore+7;
					}else{
						echo "TOUCHDOWN ". $this->awayTeam. "!<br>";
						$this->awayScore=$this->awayScore+7;
					}
					$this->yardsToFirst=10;
					$this->down=1;
					echo "Score " . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore . "<br> ";
					echo "</div> <br><br>";		
					$this->homePos=!$this->homePos;
					if($this->homePos){
						echo "<div class='home'>";
						echo "New Drive ". $this->homeTeam . " ball.<br>";
					}else{
						echo "<div class='away'>";
						echo "New Drive ". $this->awayTeam . " ball.<br>";
					}	
					$this->yardsToTD=rand(65,80)+rand(0,10);
					echo "Yards to touchdown: " . $this->yardsToTD . "   Yards to first: 10   Down: 1<br>";
				
				}else if($this->yardsToFirst<=0){
					echo "Play resulted in " . $y . " yards.<br>";
					echo "First Down!<br>";
					$this->down=1;
					if($this->yardsToTD<=10){
						$this->yardsToFirst=$this->yardsToTD;
					}else{
						$this->yardsToFirst=10;
					}
					echo "Play resulted in " . $y . " yards.<br>";
					echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
				
				}else{
					
					echo "Play resulted in " . $y . " yards<br>";
					echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: " . $this->yardsToFirst . "  Down: " . $this->down.".<br>";
					
				}
				
			}
		}
		
		
		public function run($y,$to){
			
			
			echo "Ran a RUN play<br>";
			if($to==0){
				
				echo "FUMBLE!";
				$this->yardsToFirst=10;
				$this->down=1;
				$this->homePos=!$this->homePos;
				echo "</div> <br><br>";	
				if($this->homePos){
					echo "<div class='home'>";
					echo "New Drive ". $this->homeTeam . " ball.<br>";
				}else{
					echo "<div class='away'>";
					echo "New Drive ". $this->awayTeam . " ball.<br>";
				}	
				$this->yardsToTD=rand(65,80)+rand(0,10);
				echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
								
				
			}else{
				
				$this->yardsToTD=$this->yardsToTD-$y;
				$this->yardsToFirst=$this->yardsToFirst-$y;
				$this->down++;
				
				if($this->yardsToTD<=0){
					
					
					if($this->homePos){
						echo "TOUCHDOWN ". $this->homeTeam. "!<br>";
						$this->homeScore=$this->homeScore+7;
					}else{
						echo "TOUCHDOWN ". $this->awayTeam. "!<br>";
						$this->awayScore=$this->awayScore+7;
					}
					$this->yardsToFirst=10;
					$this->down=1;
					echo "Score " . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore . " <br> ";
					echo "</div> <br><br>";		
					$this->homePos=!$this->homePos;
					if($this->homePos){
						echo "<div class='home'>";
						echo "New Drive ". $this->homeTeam . " ball.<br>";
					}else{
						echo "<div class='away'>";
						echo "New Drive ". $this->awayTeam . " ball.<br>";
					}	
					$this->yardsToTD=rand(65,80)+rand(0,10);
					
					echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
				
				}else if($this->yardsToFirst<=0){
					
					echo "First Down!<br>";
					if($this->yardsToTD<=10){
						$this->yardsToFirst=$this->yardsToTD;
					}else{
						$this->yardsToFirst=10;
					}
					$this->down=1;
					echo "Play resulted in " . $y . " yards.<br>";
					echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
				
				}else{
					
					echo "Play resulted in " . $y . " yards<br>";
					echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: " . $this->yardsToFirst . "  Down: " . $this->down.".<br>";
					
				}
				
			}
				
		}
		
		public function turnover(){
			echo "Turnover on downs!<br>";
			echo "Score " . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore . "<br>";
			echo "</div> <br><br>";
			$this->homePos=!$this->homePos;					
			if($this->homePos){
				echo "<div class='home'>";
				echo "New Drive ". $this->homeTeam . " ball.<br>";
			}else{
				echo "<div class='away'>";
				echo "New Drive ". $this->awayTeam . " ball.<br>";
			}	
			$this->yardsToFirst=10;
			$this->down=1;
			$this->yardsToTD=100-$this->yardsToTD;
			echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
		}
		
		public function fieldgoal($fg){
			echo "Kicking  field goal<br>";
			if($this->yardsToTD - $fg <=0){
				echo "Fieldgoal GOOD!<br>";
				if($this->homePos){
					$this->homeScore=$this->homeScore+3;
				}else{
					$this->awayScore=$this->awayScore+3;
				}

			}else{
				echo "Fieldgoal MISSED!<br>";
			}
			
			echo "Score " . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore . " <br> ";
			echo "</div> <br><br>";
			$this->homePos=!$this->homePos;
			if($this->homePos){
				echo "<div class='home'>";
				echo "New Drive ". $this->homeTeam . " ball.<br>";
			}else{
				echo "<div class='away'>";
				echo "New Drive ". $this->awayTeam . " ball.<br>";
			}		
			$this->yardsToTD=rand(65,80)+rand(0,10);
			echo "Yards to touchdown: " . $this->yardsToTD . "  Yards to first: 10  Down: 1<br>";
			$this->yardsToFirst=10;
			$this->down=1;
		}
		
		
		public function end(){
			echo "</div>";
			echo "<br><br><div class='gamesum'>";
			echo "<br><br>";
			if($this->homeScore == $this->awayScore){
				echo "GAME OVER!";
				echo "TIE GAME!";
			}else if($this->homeScore < $this->awayScore){
			
				echo "GAME OVER! ". $this->awayTeam . " wins!<br> ";
				echo "FINAL SCORE   " . $this->homeTeam . ": ". $this->homeScore . "  to  " .$this->awayTeam .": ". $this->awayScore . "  ";
			}else{
				echo "GAME OVER! ". $this->homeTeam . "  wins! <br> ";
				echo "FINAL SCORE   " . $this->homeTeam . ": ". $this->homeScore . "  to  " .$this->awayTeam .": ". $this->awayScore . "  ";
			}
			echo "<br><br>";
			echo "</div><br>";
			
		}
		
		public function __toString() {
			$out = "<span class='game-stats'><b>" . $this->homeTeam . ": ". $this->homeScore . " to " .$this->awayTeam .": ". $this->awayScore .  ": </b> </span> <br>"				. "<br><br>";
			return $out;
		}
		
		function __destruct(){
			echo "<span class='rain'>Game Over! See you next time!</span><br>";
		}
		
	}
