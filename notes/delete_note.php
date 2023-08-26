<?php

include "../connect.php";
include "../functions.php";

$id = filterRequest($_POST['id']);
$image = filterRequest($_POST['note_image']);

$statement = $con->prepare("DELETE FROM `notes` WHERE `id` = ?;");
$statement->execute(array(
   $id,
));

$count = $statement->rowCount();

if($count > 0)
{
    imageDelete('../upload',$image);
    echo json_encode(array("status" => "success"));
}else
{
    echo json_encode(array("status" => "fail"));
}

// echo json_encode($users);

?>