<?php

include "../connect.php";
include "../functions.php";

$username = filterRequest($_POST['username']);
$email = filterRequest($_POST['email']);
$password = filterRequest($_POST['password']);

// echo $username.' | '.$email.' | '.$password;

// $username = 'mouad';
// $email = 'mouad@gmail.com';
// $password = 'mouad';

$statement = $con->prepare("insert into users(`username`,`email`,`password`) values(:us,:em,:pa);");
$statement->execute(array(
   ":us" => $username,
   ":em" => $email,
   ":pa" => $password,
));

$count = $statement->rowCount();

if($count > 0)
{
    echo json_encode(array("status" => "success"));
}else
{
    echo json_encode(array("status" => "fail"));
}

// echo json_encode($users);

?>