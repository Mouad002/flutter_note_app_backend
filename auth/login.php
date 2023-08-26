<?php

include "../connect.php";
include "../functions.php";

$email = filterRequest($_POST['email']);
$password = filterRequest($_POST['password']);

// echo $username.' | '.$email.' | '.$password;

// $username = 'mouad';
// $email = 'mouad@gmail.com';
// $password = 'mouad';

$statement = $con->prepare("SELECT * FROM `users` WHERE `email` = :em and `password` = :pa");
$statement->execute(array(
   ":em" => $email,
   ":pa" => $password,
));

$data = $statement->fetch(PDO::FETCH_ASSOC);

$count = $statement->rowCount();

if($count > 0)
{
    echo json_encode(array("status" => "success","data" => $data));
}else
{
    echo json_encode(array("status" => "fail"));
}

// echo json_encode($users);

?>