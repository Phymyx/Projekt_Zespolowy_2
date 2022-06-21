



<?php

require_once './user/user.php';

session_start();


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'matkrzyrad';
$DATABASE_NAME = 'sensorapp';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		if (password_verify($_POST['password'], $password)) {
		//if (password_verify('(wdW43cfeM4op', $hash)) {
		//if (True) {
		//if ($_POST['password'] == $password) {	
			session_start();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['id'] = $id;
			
			//$permission = $_SESSION['permission'];
			//header("location: indexuzytkownik.php");
			
			$id_pol = mysqli_connect("localhost","root","matkrzyrad");
			if($id_pol)
			{
				$baza = mysqli_select_db($id_pol, "sensorapp");
				if($baza)
				{
					$resp = get_user($_POST['username']);
					if(array_key_exists('user', $resp )) {
						if(!isset($_SESSION['user']))
							$_SESSION['user']=array(
								'id' => $resp['user']['id'],
								'username'=> $resp['user']['username'],
								'email'=> $resp['user']['email'],
								'permission'=> $resp['user']['permission'],
							);
							header("location: index.php");
					}
					
					$wynik = mysqli_query($id_pol, "SELECT * FROM user ORDER BY id") or die(mysqli_error($id_pol));
					while($wiersz = mysqli_fetch_array($wynik))
					{
						
						if ($wiersz['permission'] == 'ADMIN')
						{
							header("location: index.php");
						}/*
						elseif ($wiersz['permission'] == 'STANDARD')
						{
							header("location: indexuzytkownik.php");
						} */
					}
					
				}
			}
			mysqli_close($id_pol);
			
			/*
			if ($permission == 'ADMIN')
			{
				echo 'dasdasdasdas';
				header("location: index.php");
			}
			else
			{
				echo 'sdadasdasd';
				header("location: indexuzytkownik.php");
			}
			*/
			
		} else {
			echo 'Incorrect username and/or password! (2)';
		}
	} else {
		echo 'Incorrect username and/or password! (1)';
	}
	
	$stmt->close();
}
?>