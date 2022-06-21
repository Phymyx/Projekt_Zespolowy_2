<?php
$id_pol = mysqli_connect("localhost","root","matkrzyrad");
	if($id_pol)
	{
		$baza = mysqli_select_db($id_pol, "sensorapp");
		if($baza)
		{
			//echo "Udało się nawiązać połaczenie z bazą!</br>";
			
			$wynik = mysqli_query($id_pol, "SELECT * FROM sensor3 ORDER BY id DESC LIMIT 10") or die(mysqli_error($id_pol));
			
			echo '<table id="baza">';
			echo '<tr id="mainrow">'; 
			
			echo '<td>id</td><td>snmp_oid</td><td>name</td><td>value</td><td>datetime</td>';
						
			
			while($wiersz = mysqli_fetch_array($wynik))
			{

				
				echo '<tr>';
					echo
					'<td>'.$wiersz['id'].'</td>'.
					'<td>'.$wiersz['snmp_oid'].'</td>'.
					'<td>'.$wiersz['name'].'</td>'.
					'<td>'.$wiersz['value'].'</td>'.
					'<td>'.$wiersz['datetime'].'</td>'.
					'</tr></td>';

			}
			
			echo '</table>';
			
			mysqli_close($id_pol);
		}
		else
		{
			echo "Nie udało się nawiązać połaczenia z bazą!</br>";
		}
	}
	else
	{
		echo "Nie udało się nawiązać połaczenia z serwerem bazy!</br>";
	}
?>