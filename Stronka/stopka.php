<?php
$id_pol = mysqli_connect("mysql.cba.pl","wequntroll","Kochamgotowac2");
	if($id_pol)
	{
		$baza = mysqli_select_db($id_pol, "wequntroll");
		if($baza)
		{
			echo "</br>";
			
			$wynik = mysqli_query($id_pol, "SELECT * FROM wequntroll ORDER BY id DESC LIMIT 1");
			
			
			while($wiersz = mysqli_fetch_array($wynik))
			{
				
				echo '<tr>';
					
					echo "temperatura - ";
					echo'<td>'.$wiersz['temperatura'].'</td></br>';
					echo "wilgotnosc - ";
					echo'<td>'.$wiersz['wilgotnosc'].'</td>'.
					'</tr></td>';

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