<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>MOT - Mein Online Tagebuch</title>
	<link rel="stylesheet" type="text/css" href="TagebuchStyle.css">
</head>
<body>
<?php include "dbconnect.php" ?>
	<header>
		<h1>Mein Online Tagebuch</h1>
	</header>
	<main>
		<article>
			<a id="LogoutLink" href="Login.html">Logout</a></br>
		</article>
		<section>
			<article id="EingabeHome">
				<!--<h2>Schreibe einen Tagebucheintrag</h2>-->
				<form id="FormTagebucheintrag" action="TagebuchEintrag.php" method="post">
					<label for="Eintragsdatum">Eintragsdatum:</label>
					<input id="Eintragsdatum" type="date"></input>
					<label id="KategorieDropdownLabel" for="KategorieDropdown">Kategorie:</label>
					<select id="KategorieDropdown">
					<?php
						$sql = "SELECT Kategorie FROM Kategorie";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<option value='".$row['Kategorie']."'>".$row['Kategorie']."</option>";
							}	
						?>
						<!--option value=""></option-->
					</select>
				</form>
			</article>
			<article id="SucheLink">
				<a href="suchen.html"><img src="Bilder/searchIcon.png" width="25px" height="25px"> Eintrag Suchen</img></a>
			</article>
		</section>
		<section id="Tagebuch">
			<article id="LinkeBuchseite">
				<h3>Tagebucheintrag:</h3>
				<textarea id="TextZumTagebucheintrag" for="FormTagebucheintrag">Schreibe hier deinen Eintrag...</textarea>
			</article>
			<article id="RechteBuchseite">
				<p id="RechteseiteOhneBild" visible="true">
					<p id="No-ImageIcon">
						<img src="Bilder/no-image.png" alt="Noch kein Bild icon" height="40" width="40"></img>
						Noch kein Bild hinzugefügt...</p>
					<p id="BildHinzufuegen">Bild auswählen?</br><input type="file" name="BildZumTagebucheintrag" accept="image/*"></p>
					<button id="SpeicherButton" for="FormTagebucheintrag" type="submit">Eintrag Speichern</button>
				</p>
			</article>			
		</section>
	</main>		
	<footer>
		<p>Case Study TI3 Webtechnologien 1</p>
	</footer>
</body>
</html>