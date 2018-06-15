<!DOCTYPE html>

<html lang="en">
	<head>
		<style>
		
			body {
				background-color: #97a6c4;
				font-family: Verdana, Geneva, sans-serif;
			}
			button, input[type='submit']{
				border: 1.5px solid #CAF7FF;
				border-radius: 4.5px;
				cursor: pointer;
				font-size: 15px;
				margin-top: 5px;

			}
			input[type='text'], textarea {
				border: 1.5px solid #CAF7FF;
				border-radius: 4.5px;
				font-size: 15px;
				margin-top: 5px;
				background-color: lightblue;
			}

			
			button:hover, input[type='submit']:hover {
				color: white;
				background-color: grey;
				border: 1.5px solid #afceff;
			}

			input { 
				line-height: 18px; 
			}
			fieldset {
				border: 1px solid #CAF7FF;
				padding: 12px;
				margin-top: 10px;
				border-radius: 4.5px;
			}
			
			img {
				border-radius: 50%;
			}
			
			.inl {
				clear: none;
				display: inline;
			}
		</style>
		
		<script>
			//for #5
			var h = 0; 
			var t = 0; 
			function coinToss() {
				var head = "heads.jpg";
				var tail = "tails.jpg";
				var chance = Math.floor(Math.random() * Math.floor(100));
				//if mod of random num is 0 its heads, otherwise tails (even/odd)
				if (chance % 2 === 0) {//heads is even, inc heads
					h++;
					document.getElementById('side').src=head;
					document.getElementById("heads").innerHTML = h;
				} 
				else { //else odd, inc tails
					t++;
					document.getElementById('side').src=tail;
					document.getElementById("tails").innerHTML = t;
				}
			}
			//for #6
			function add() {
				var newText = document.getElementById("paragraph").value.replace(/\r?\n/g, '<br>');//set new text
				var myEssay = document.getElementById("essay_body");//set current body
				myEssay.innerHTML += "<p>"+newText+"</p>";//append
				document.getElementById("paragraph").value = "";//clear
			}
		</script>
			
		<?php
			//input: string to check
			function isPalindrome($someString){
				$someString = strtoupper(preg_replace('/\s+/', '', $someString));
				if(strrev($someString) == $someString || $someString == "") return true;
				else return false;
			}
			//input: filename(sums.txt), lineNumber. PHP is so functional this is cool.
			function lineSum($someFile, $someNum){
				return array_sum(explode(" ",file($someFile)[$someNum])); //so functional, take a file, strip a line, explode it into an array
			}
		?>

	</head>

	<body>
		<h1 id="hName">~Unit 2 Coding Exercises~</h1>
		<h2>Noah D. Garner</h2>
		<h3>For Comp 127 Summer Sesh I - 2018</h3>
		<ol>
			<!-- Q 1 -->
			<li>Test to see if a word, a number, or an alphanumeric string is a palindrome:<br>
				<form method="post" action="index.php">
					<fieldset>
						<input type="text" name="strToTest">
						<input class="inl" type="submit" name="submitPalindrome" value="Enter">
						<?php
							if(isset($_POST['submitPalindrome'])) {
								$testString = $_POST['strToTest'];
								if(isPalindrome($testString)) echo 'Palindrome!';
								else echo 'Not a Palindrome. Try again.';
							}
						?>
					</fieldset>
				</form>
				<br>
			</li>

			<!-- Q 2 -->
			<li>Enter a line (1-9) from sums.txt to compute:
				<form method="post" action="index.php">
					<fieldset>
						<input type="text" name="lnum" size="5" value>
						<input class="inl" type="submit" name="submitSum" value="Enter"> <!-- inline it -->
						<?php
							if(isset($_POST['submitSum'])) {
								$testNum = $_POST['lnum'];
								if($testNum > 0 && $testNum < 10) {
									$sum = lineSum('sums.txt',$testNum-1);
									echo "The sum of numbers on line $testNum of sums.txt is: $sum";	
								}
								else echo 'Invalid input, must be 1-9 inclusive.';
							}
						?>
					</fieldset>
				</form>
				<br>
			</li>

			<!-- Q 3 -->
			<li>Enter a string to query image links: 
				<form action="search.php" method="get">
					<fieldset>Type a query:
						<input type="text" name="query" value>
						<input type="submit" value="Search"> <!-- inline it -->
					</fieldset>
				</form>
				<br>
			</li>

			<!-- Q 4 -->
			<li>Enter a string to query for an image thumbnail (try "the bear" with and without quotes): 
				<form action="search2.php" method="get">
					<fieldset>Type a query:
						<input type="text" name="query" value>
						<input type="submit" value="Search"> <!-- inline it -->
					</fieldset>
				</form>
				<br>
			</li>

			<!-- Q 5 -->
			<li>Coin Flip!
				<fieldset>
					<div id="coinflip">
						<img id="side" src="heads.jpg" style="width:200px; height:200px;">
					</div>
					<div id="flipbutton">
						<br><button onclick="coinToss();">Flip me!</button><br>
						<p>Heads Count: <span id="heads">0</span></p>
						<p>Tails Count: <span id="tails">0</span></p>
					</div>
				</fieldset>
				<br>
				
			</li>

			<!-- Q6 -->
			<li>Essay Builder: 
				<fieldset>
					 Text to insert: <br />
					 <textarea id="paragraph" rows="10" cols="50"></textarea><br>
					 <button id="add" onclick="add();">Add</button><br>
				<fieldset>
				<p id="essay">Your Essay Thus Far:</p>
				<div id="essay_body"></div>
			</li>

		</ol>
	</body>
</html>