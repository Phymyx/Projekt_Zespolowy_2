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
	<link href="fontawesome/css/all.css" rel="stylesheet">
<body>
<div id="maincontainer">
	<div id="logo">
		Odczyt z czujników SNMP
	</div>
	
	<div id="menu">
		<ul id="menulist">
			<li><a href="indexuzytkownik.php?str=1&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Strona główna </span></button></a></li>
			<li><a href="indexuzytkownik.php?str=3&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Czujnik 1 </span></button></a></li>
			<li><a href="indexuzytkownik.php?str=4&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Czujnik 2 </span></button></a></li>
			<li><a href="indexuzytkownik.php?str=5&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Kontakt </span></button></a></li>
			<li><a href="logout.php"><button class="button" style="vertical-align:middle"><span>Wyloguj </span></button></a></li>
		</ul>
	</div>
	
	<div id="cos">	
		<?php
		if(isset($_GET['str']))
		{
			
			if($_GET['str']==1)
			{
				
				echo "Temat: Odczytywanie napiecia w gniazdku trójfazowym </br>";
                echo "</br>";
                echo "SIEEEEMA";
			}
			else if ($_GET['str']==2)
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				include 'baza.php';
			}
			else if ($_GET['str']==3)
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				include 'baza2.php';
			}
			else if ($_GET['str']==4)
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				include 'baza3.php';
			}
			else if ($_GET['str']==5)
			{
				
				echo "Dane kontaktowe:</br>";
                echo "</br>";
                echo "Krzysz Barło - mail</br>";
                echo "Mati Karpik - mail</br>";
                echo "Tomek Radek - mail</br>";
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