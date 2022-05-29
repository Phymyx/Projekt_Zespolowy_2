<?php


require_once 'db_config.php';
require_once 'db_connect.php';

// zapis użytkownika - rejestracja
function save_user($username, $password, $email, $permission) { 
    $password = md5($password);
    // uprawnienia
    // 1 - standard - zwykly uzytkownik
    // 0 - admin - administrator
    if($permission == 0 OR $permission == "ADMIN") {
        $permission = "ADMIN";
    }
    elseif ($permission == 1 OR $permission == "STANDARD") {
        $permission = "STANDARD";
    }
    else {
        $permission = "NONE";
    }

    $response['user'] = null;
    $db = connect();
    $query="SELECT ". "id" ." FROM ". "user" ." WHERE ". "username" ."= ? OR ". "email" ."= ?";
    $stmt =  mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row_cnt = mysqli_num_rows($result);
	printf("Result set has %d rows.\n", $row_cnt);
    
    if($row_cnt > 0){
        $response['error'] = true;
        $response['message'] = 'User already registered';
    }else{
        mysqli_stmt_close($stmt);
        $query="INSERT INTO ". "user" ." (". "username" .", ". "email" .", ". "password" .", ".
             "permission" .") VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $permission);

        if(mysqli_stmt_execute($stmt) && mysqli_affected_rows($db) == 1){
            $id = mysqli_insert_id($db);
            
            $user = array(
                'id'=>$id, 
                'username'=>$username, 
                'email'=>$email,
                'permission'=>$permission,
            );
            $response['error'] = false; 
            $response['message'] = 'User registered successfully'; 
            $response['user'] = $user; 
        }
        else {
            $response['error'] = true; 
            $response['message'] = 'Insert query isnt executed properly'; 
        }
    }
    mysqli_stmt_close($stmt); // zamknięcie połączenia dla wszystkich if i else,
    mysqli_close($db);
    return $response; 
}

//pobranie użytkownika z bazy danych
function get_user($username, $email = null) {
    $db = connect();
	$query = "SELECT * FROM user WHERE ". "username" ."= ? OR ". "email" ."= ?";
    $stmt =  mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row_cnt = mysqli_num_rows($result);
    if($row_cnt  != 1){
        $response['error'] = true;
        $response['message'] = 'User doesnt exist';
        $response['user'] = null;
    }else{
        $response['user'] = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt); // zamknięcie połączenia dla wszystkich if i else,
    mysqli_close($db);
    return $response; 
}

function login($email, $password) {
    $password = md5($password); 

    $db = connect();
    $query="SELECT ". "id" .", ". "username" .", ". "email" .", ". "permission".
        " FROM ". "user" .
        " WHERE ". "email" . "= ? AND ". "password" ."= ?";
    $stmt =  mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email , $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row_cnt = mysqli_num_rows($result);
    $id = '';
    $username = '';
    $permission = '';
    if($row_cnt > 0){
        mysqli_stmt_bind_result($stmt, $id, $username, $email, $permission);
        mysqli_fetch_array($result);
        
        $user = array(
            'id'=>$id, 
            'username'=>$username, 
            'email'=>$email,
            'permission'=>$permission,
        );
        $response['error'] = false; 
        $response['message'] = 'Login successfull'; 
        $response['user'] = $user; 
    }else{
        $response['error'] = false; 
        $response['message'] = 'Invalid email or password';
        $response['user'] = null;
    }
    return $response;
}
?>