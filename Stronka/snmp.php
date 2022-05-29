<?php

 // zamienia wartosc snmp string na int
function snmp_value_toint($snmpValue) {
	$strValue = str_split($snmpValue);
	$arr = array();
	$j=0;
	for($i=9; $i<strlen($snmpValue); $i++) {
		  $arr[$j]= $strValue[$i];
		  $j++;
	}
	$int_value = (int) join('', $arr);
	return $int_value;
}

 // pobiera snmp z serwera
function get_snmp($name, $snmpId) {
	$snmpServer="82.145.73.26"; 
	$session = new SNMP(SNMP::VERSION_1, $snmpServer, "public");
	$snmpValue = $session->get($snmpId);
	return array(
        'name' => $name,
        'snmpId' => $snmpId,
        'snmpValue'  => $snmpValue
    );
}

require_once 'db_config.php';
require_once 'db_connect.php';

// zapisuje snmp do bazy danych
function save_snmp($snmpName, $snmpId, $db_table_name) {
	$snmpObj = get_snmp($snmpName, $snmpId);
	$intValue = snmp_value_toint($snmpObj["snmpValue"]);
	$db = connect();
	$result = mysqli_query($db, "INSERT INTO $db_table_name(snmp_oid, name, value) VALUES('$snmpId','$snmpName', '$intValue')");
	if ($result) {
		echo'<br>';
		echo "Dodane do bazy";
		echo'<br>';
	}
	else {
		echo'<br>';
		echo "Nie dodane do bazy";
		echo'<br>';
	}
	mysqli_close($db);
	return $snmpObj;
}

// pobiera snmp z bazy danych po dacie
function retrieve_snmp_by_date($snmpName, $snmpId, $db_table_name, $date_lower, $date_upper) {
	$db = connect();
	//$result = mysqli_query($db, "SELECT * FROM $db_table_name");
	$stmt = mysqli_prepare($db, "SELECT * FROM $db_table_name WHERE datetime >= ? AND datetime <= ?");
	
	// $date_lower = '2022-05-10 08:09:06';
	// $date_upper = '2022-05-10 09:06:34';
	$timestamp_lower = strtotime($date_lower);
	$timestamp_upper = strtotime($date_upper);
	$lower = date('Y-m-d H:i:s', $timestamp_lower);
	$upper = date('Y-m-d H:i:s', $timestamp_upper);

	mysqli_stmt_bind_param($stmt, "ss", $lower, $upper);

	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	$result_array = array();
	$i=0;
	while ($row = mysqli_fetch_array($result)) {
        #echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Snmp_Oid: " . $row["snmp_oid"]. " - Value: " . $row["value"]. " - DateTime: " . $row["datetime"]."<br>";
		  $result_array[$i] = $row;
		  $i = $i +1;
    }
	mysqli_stmt_close($stmt);
    mysqli_close($db);
	return $result_array;
}

// pobiera snmp z bazy danych
function retrieve_snmp($snmpName, $snmpId, $db_table_name) {
	$db = connect();
	$result = mysqli_query($db, "SELECT * FROM $db_table_name");
	echo "<br>";

	$row_cnt = mysqli_num_rows($result);
	printf("Result set has %d rows.\n", $row_cnt);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$i =0;
		#echo "<br>";
		while($row = mysqli_fetch_assoc($result)) {
		  #echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Snmp_Oid: " . $row["snmp_oid"]. " - Value: " . $row["value"]. " - DateTime: " . $row["datetime"]."<br>";
		  $result_array[$i] = $row;
		  $i = $i +1;
		}
	  } else {
		echo "0 results";
	  }  
	mysqli_close($db);
	return $result_array;
}

?>