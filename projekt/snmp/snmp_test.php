<?php
require_once 'snmp.php';

$snmpName = "UpsOutputVoltage";
$snmpId = '1.3.6.1.2.1.33.1.4.4.1.2.1';
$snmpObj = save_snmp($snmpName, $snmpId, DB_TABLE_SENSOR1);

$date_lower = '2022-05-10 08:09:06';
$date_upper = '2022-05-10 09:06:34';

echo "<h1>UpsOutputVoltage</h1>";
echo "<h2>Czujnik nr 1</h2>";

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR1, $date_lower, $date_upper);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR1, $date_lower, $date_upper, 0, 5, False);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array2 = retrieve_snmp($snmpName, $snmpId, DB_TABLE_SENSOR1);
echo "<br>";
for ($x = 0; $x < count($snmp_array2); $x++) {
    echo "id: " . $snmp_array2[$x]["id"]. " - Name: " . $snmp_array2[$x]["name"]. " - Snmp_Oid: " . $snmp_array2[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array2[$x]["value"]. " - DateTime: " . $snmp_array2[$x]["datetime"]."<br>";
}

echo "<h2>Czujnik nr 2</h2>";
$snmpId = '1.3.6.1.2.1.33.1.4.4.1.2.2';
$snmpObj = save_snmp($snmpName, $snmpId, DB_TABLE_SENSOR2);

$date_lower = '2022-06-18 10:00:06';
$date_upper = '2022-06-20 09:06:34';

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR2, $date_lower, $date_upper);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR2, $date_lower, $date_upper, 0, 5, False);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array2 = retrieve_snmp($snmpName, $snmpId, DB_TABLE_SENSOR2);
echo "<br>";
for ($x = 0; $x < count($snmp_array2); $x++) {
    echo "id: " . $snmp_array2[$x]["id"]. " - Name: " . $snmp_array2[$x]["name"]. " - Snmp_Oid: " . $snmp_array2[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array2[$x]["value"]. " - DateTime: " . $snmp_array2[$x]["datetime"]."<br>";
}

echo "<h2>Czujnik nr 3</h2>";
$snmpId = '1.3.6.1.2.1.33.1.4.4.1.2.3';
$snmpObj = save_snmp($snmpName, $snmpId, DB_TABLE_SENSOR3);

$date_lower = '2022-06-18 10:00:06';
$date_upper = '2022-06-20 09:06:34';

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR3, $date_lower, $date_upper);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array = retrieve_snmp_by_date($snmpName, $snmpId, DB_TABLE_SENSOR3, $date_lower, $date_upper, 0, 5, False);
echo "<br>";
for ($x = 0; $x < count($snmp_array); $x++) {
    echo "id: " . $snmp_array[$x]["id"]. " - Name: " . $snmp_array[$x]["name"]. " - Snmp_Oid: " . $snmp_array[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array[$x]["value"]. " - DateTime: " . $snmp_array[$x]["datetime"]."<br>";
}

$snmp_array2 = retrieve_snmp($snmpName, $snmpId, DB_TABLE_SENSOR3);
echo "<br>";
for ($x = 0; $x < count($snmp_array2); $x++) {
    echo "id: " . $snmp_array2[$x]["id"]. " - Name: " . $snmp_array2[$x]["name"]. " - Snmp_Oid: " . $snmp_array2[$x]["snmp_oid"]. 
        " - Value: " . $snmp_array2[$x]["value"]. " - DateTime: " . $snmp_array2[$x]["datetime"]."<br>";
}