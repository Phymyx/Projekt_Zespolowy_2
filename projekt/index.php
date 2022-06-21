<?php

require_once './snmp/snmp.php';

session_start();
if(!isset($_SESSION['user']))
	$_SESSION['user']=array(
		'id' => -1,
		'username'=> "gosc",
		'email'=> "",
		'permission'=> "GUEST",
	);

	$per_page_record = 10;  // Number of entries to show in a page.   
	// Look for a GET variable page if not found default is 1.        
	if (isset($_GET["page"])) {    
		$page  = $_GET["page"];    
	}    
	else {    
		$page=1;    
	} 
	$start_from = ($page-1) * $per_page_record;
	
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
	<link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
<div id="maincontainer">
	<div id="logo">
		Odczyt z czujników SNMP
		<p style="font-size:16px;color:red;">Zalogowany jako <?php echo $_SESSION['user']['username']; ?>
			, konto <?php echo $_SESSION['user']['permission']; ?><p>
	</div>
	
	<div id="menu">
		<ul id="menulist">
			<li><a href="index.php?str=1&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Strona główna </span></button></a></li>
			<li><a href="index.php?str=2&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Czujnik 1 </span></button></a></li>
	<?php if ($_SESSION['user']['permission'] == 'STANDARD' OR $_SESSION['user']['permission'] == 'ADMIN') { ?>
			<li><a href="index.php?str=3&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Czujnik 2 </span></button></a></li>
	<?php if ($_SESSION['user']['permission'] == 'ADMIN') { ?>
			<li><a href="index.php?str=4&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Czujnik 3 </span></button></a></li>
	<?php } ?>
			<li><a href="index.php?str=5&PHPSESSID=6d55d70d4f5c4fa95ab3bdad5d45c3df"><button class="button" style="vertical-align:middle"><span>Kontakt </span></button></a></li>
	<?php } ?>	
			<li><a href="logout.php"><button class="button" style="vertical-align:middle"><span>Wyloguj </span></button></a></li>
		</ul>
	</div>
	
	<div id="cos">
		<?php
		if(isset($_GET['str']))
		{
			if($_GET['str']==1)
			{
				
				echo "<h2>Temat: Odczytywanie napiecia w gniazdku trójfazowym</h2>";
                //echo "</br>";
                echo "<b>Nazwa: $snmp_name</b></br>";
				echo "OIDS:</br>";
				echo "Czujnik 1: $snmpId1</br>";
				echo "Czujnik 2: $snmpId2</br>";
				echo "Czujnik 3: $snmpId3</br>";
			}
			else if ($_GET['str']==2)
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				require_once 'snmp_table.php';
				//echo "start_from: $start_from";
				show_snmp($snmp_name, $snmpId1, DB_TABLE_SENSOR1, $start_from, $per_page_record);
				// include 'baza.php';
			}
			else if ($_GET['str']==3 )
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				//include 'baza2.php';
				require_once 'snmp_table.php';
				//echo "start_from: $start_from";
				show_snmp($snmp_name, $snmpId2, DB_TABLE_SENSOR2, $start_from, $per_page_record);
			}
			else if ($_GET['str']==4)
			{
				
				//echo "TUTAJ BĘDĄ WYŚWIETLANE PARAMETRY</br>";
				//include 'baza3.php';
				require_once 'snmp_table.php';
				//echo "start_from: $start_from";
				show_snmp($snmp_name, $snmpId3, DB_TABLE_SENSOR3, $start_from, $per_page_record);
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