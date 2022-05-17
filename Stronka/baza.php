<?php
$id_pol = mysqli_connect("mysql.cba.pl","wequntroll","Kochamgotowac2");
	if($id_pol)
	{
		$baza = mysqli_select_db($id_pol, "wequntroll");
		if($baza)
		{
			echo "Udało się nawiązać połaczenie z bazą!</br>";
			
			$wynik = mysqli_query($id_pol, "SELECT * FROM wequntroll");
			
			echo '<table id="baza">';
			echo '<tr id="mainrow">'; 
			
			echo '<td>Temperatura</td><td>Wilgotnosc</td>';
			
			while($wiersz = mysqli_fetch_array($wynik))
			{
				
				echo '<tr>';
					echo
					'<td>'.$wiersz['temperatura'].'</td>'.
					'<td>'.$wiersz['wilgotnosc'].'</td>'.
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