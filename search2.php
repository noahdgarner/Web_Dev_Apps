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
			img {
				border: 1px solid #afceff;
				border-radius: 4.5px;
				padding: 5px;
				width: 150px;
				height: 100px;
			}
			img:hover {
				box-shadow: 0 0 10px 5px rgba(0, 140, 186, 0.5);
			}
			a {
				color: black;
				text-decoration: none;
			}
			a.title {
				color: blue;
				background-color: grey;
				border-radius: 4.5px;
			}
		</style>
	</head>

	<body>
		<h1 id="hName">Search Results</h1>

			<?php
				//get rid of white space
				if(trim($_GET['query']) !== ''){
					$someFolder = 'images';
					$alreadyPrinted = array();
					//THIS WAS ASS, takes any string inside string and simply creates new string array
					$stringArray = str_getcsv(trim($_GET['query']), ' ');
					$count = 0;
					//print contents of array for user to see what their query is
					echo "Your query: "; foreach($stringArray as $value) echo "$value "; echo "<br><br>";
					//this was a lot of fun...
					if(file_exists($someFolder)){
						foreach (scandir($someFolder) as $imageName) {
							foreach ($stringArray as $aString)
								if(strpos(strtoupper($imageName),strtoupper($aString)) !== false) {	
									if(!in_array($imageName,$alreadyPrinted)){
										array_push($alreadyPrinted,$imageName);
										if($count%4 == 0) echo "<br>"; //every 4 images, return, so we get a 4/4 table on input j
										//do the string printing. convert image print its thumbnail, format it to 100px
										echo "<a href='images/$imageName' title='$imageName'><img src='images/$imageName' alt='$imageName' title='$imageName'></a> ";
										$count++; //to check how many files we found
									}
								}
						}
						if (!$count) echo 'No image files matched your query.';
					}
					//invalid folder name.
					else echo "$someFolder could not be located.<br>Please type a proper folder name.";
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








