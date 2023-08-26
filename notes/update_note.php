<?php

include "../connect.php";
include "../functions.php";

$id = filterRequest($_POST['id']);
$title = filterRequest($_POST['title']);
$text = filterRequest($_POST['text']);

$statement = $con->prepare("UPDATE `notes` SET `title` = ? ,`text` = ? WHERE `id` = ?;");
$statement->execute(array(
   $title,
   $text,
   $id,
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