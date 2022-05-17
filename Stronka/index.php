<?php
session_start();
if(!isset($_SESSION['']))
	$_SESSION['']=array();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Oto opis strony" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>projekcik</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="maincontainer">
	<div id="logo">
		Aplikacja webowa do odczytywania temperatury i wilgotności w pomieszczeniach
	</div>
	
	<div id="menu">
		<ul id="menulist">
			<li><a href="index.php?str=1&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df">strona główna</a></li>
			<li><a href="index.php?str=2&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df">parametry</a></li>
			<li><a href="index.php?str=3&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df">kontakt</a></li>
		</ul>
	</div>
	
	<div id="cos">
		<?php
		if(isset($_GET['str']))
		{
			if($_GET['str']==1)
			{
				
				echo "Temat: Aplikacja webowa do odczytywania temperatury i wilgotności w pomieszczeniach </br>";
				echo "</br>";
				echo "W przeciągu ostatnich lat gorącym tematem stało się IoT, czyli internet rzeczy. Jednym z przykładowych zastosowań IoT jest tzw. smart home. Na smart home składają się m. in. takie komponenty jak czujniki, oświetlenie lub ogrzewanie. W projekcie zajmiemy się realizacją systemu do pomiaru temperatury oraz wilgotności. Taki system jest podstawą do późniejszego wdrożenia dodatkowych funkcjonalności umożliwiających kontrolę temperatury.";
			}
			else if ($_GET['str']==2)
			{
				
				echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				include 'baza.php';
			}
			else if ($_GET['str']==3)
			{
				
				echo "Dane kontaktowe:</br>";
				echo "</br>";
				echo "Krzysztof Barłowski - mail</br>";
				echo "Volodymyr Kozlov - mail</br>";
				echo "Paweł Stempnik - mail</br>";
			}
			else
			{
				echo "Strona Główna";
			}
		}
		?>
	</div>
	
	<div id="footer">
	Najnowsze dane: <?php
			include 'stopka.php';
	?>
	</div>
	
</div>
</body>
</head>
</html>