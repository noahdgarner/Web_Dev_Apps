<!DOCTYPE html>

<html lang="en">
	<head>
		<style>
			body {
				background-color: #97a6c4;
			}
			button {
				border: 1px solid #CAF7FF;
				border-radius: 4.5px;
				cursor: pointer;
				font-size: 15px;
			}
			button:hover {
				color: white;
				background-color: grey;
				border: 1.5px solid #afceff;
			}
			a {
				color: black;
				text-decoration: none;
			}
			a:hover {
				border-radius: 2px;
				background-color: lightblue;
				color: white;
			}
		</style>
	</head>

	<body>
		<h1 id="hName">Search Results</h1>
				<?php
					if(trim($_GET['query']) !== '') {
						$someFolder = "images";
						//get rid of white space
						$someString = trim($_GET['query']);
						$count = false;
						echo "Your query: $someString<br>";
				
						if(file_exists($someFolder)){
				?>
						<ul>
				<?php	
							foreach (scandir($someFolder) as $imageName) {
				
								if(strpos(strtoupper($imageName),strtoupper($someString)) !== false) {									
									echo "<li><a href='images/$imageName'>$imageName</a></li>";	
									$count = true; //to check how many files we found
								}
								
							}
				?>
						</ul>
				<?php
							if (!$count) echo 'No image files matched your query.';
						}
						//invalid folder name.
						else echo "<br>$someFolder could not be located.<br>Please type a proper folder name.";
					}
					//they didn't input anything.
					else 
						echo "You need to input a string to query.";
				?>
		<p>
			<button onclick="window.history.back();">Return to Unit 2 Exercises</button>
		</p>
	</body>
</html>





