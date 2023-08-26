<?php

include "../connect.php";
include "../functions.php";

$userId = filterRequest($_POST['id']);

// echo $username.' | '.$email.' | '.$password;

// $username = 'mouad';
// $email = 'mouad@gmail.com';
// $password = 'mouad';

$statement = $con->prepare("SELECT * FROM `notes` WHERE `owner` = :id;");
$statement->execute(array(
   ":id" => $userId,
));

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

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