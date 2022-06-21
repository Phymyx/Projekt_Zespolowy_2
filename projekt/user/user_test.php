<?php

require_once 'user.php';

function user_print($u) {
    if(!is_null($u)) {
        echo '<br>';
        echo "id: " . $u["id"]. " - Username: " . $u["username"]. " - Email: " . $u["email"]. 
                " - Permission: " . $u["permission"]. "<br>";
    }
}

$admin = array(
    'username'=> "admin",
    'password'=> "admin" ,
    'email'=> "admin@onet.pl",
    'permission'=> "ADMIN",
);
$user = array(
    'username'=> "jnowak",
    'password'=> "wdW43cfeM4op" ,
    'email'=> "jnowak@wp.pl",
    'permission'=> 0,
);
$user2 = array(
    'username'=> "bgolak",
    'password'=> "23kkwef(832" ,
    'email'=> "bgolak@onet.pl",
    'permission'=> 1,
);
$user3 = array(
    'username'=> "user",
    'password'=> "user" ,
    'email'=> "user@wp.pl",
    'permission'=> 1, // 1 - STANDARD
);

$resp = save_user($admin['username'], $admin['password'], $admin['email'], $admin['permission']);
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}

$resp = save_user($user['username'], $user['password'], $user['email'], $user['permission']);
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}

$resp = login($user['email'], $user['password']);
echo '\nUser: '.$user['email']. ' '.$resp['message'];

$resp = save_user($user2['username'], $user2['password'], $user2['email'], $user2['permission']);
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}

$resp = login($user2['email'], $user2['password']);
echo 'User: '.$user2['email']. ' '.$resp['message'];

$resp = save_user($user3['username'], $user3['password'], $user3['email'], $user3['permission']);
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}

echo '<br>';
$resp = get_user('jnowak');
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}
$resp = get_user('bgolak', 'bgolak@onet.pl');
if(array_key_exists('user', $resp )) {
    user_print($resp['user']);
}


