<?php
$id_pol = mysqli_connect("localhost","root","matkrzyrad");
	if($id_pol)
	{
		$baza = mysqli_select_db($id_pol, "sensorapp");
		if($baza)
		{
			echo "</br>";
			
			$wynik = mysqli_query($id_pol, "SELECT * FROM sensor1 ORDER BY id DESC LIMIT 1") or die(mysqli_error($id_pol));
			$wynik1 = mysqli_query($id_pol, "SELECT * FROM sensor2 ORDER BY id DESC LIMIT 1") or die(mysqli_error($id_pol));
			$wynik2 = mysqli_query($id_pol, "SELECT * FROM sensor3 ORDER BY id DESC LIMIT 1") or die(mysqli_error($id_pol));
								
			
			while($wiersz = mysqli_fetch_array($wynik))
			{

				
				echo '<tr>';
					
					echo '<i class="fas fa-bolt"></i>';
					echo "czujnik 1:";
					echo " ";
					echo'<td>'.$wiersz['value'].'</td></br>';
					/*
					echo '<i class="fas fa-temperature-high"></i>';
					echo " ";
					echo'<td>'.$wiersz['value'].'</td>'.
					

					'</tr></td>';*/

			}
			
			while($wiersz2 = mysqli_fetch_array($wynik1))
			{
				echo '<tr>';
					echo '<i class="fas fa-bolt"></i>';
					echo "czujnik 2:";
					echo " ";
					echo'<td>'.$wiersz2['value'].'</td></br>';
			}
			
			while($wiersz3 = mysqli_fetch_array($wynik2))
			{
				echo '<tr>';
					echo '<i class="fas fa-bolt"></i>';
					echo "czujnik 3:";
					echo " ";
					echo'<td>'.$wiersz3['value'].'</td></br>';
			}
				
			
			
			
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