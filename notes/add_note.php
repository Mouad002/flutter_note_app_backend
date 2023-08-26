<?php

include "../connect.php";
include "../functions.php";

$title = filterRequest($_POST['title']);
$text = filterRequest($_POST['text']);
$owner = intval(filterRequest($_POST['owner']));
$image_file = $_FILES['note_image'];

$randomNumber = rand();

$image_path = imageUpload($image_file,$randomNumber);

if($image_path=="fail"){
    return;
}

$statement = $con->prepare("insert into notes(`title`,`text`,`owner`,`image`) values(?,?,?,?);");
$statement->execute(array(
   $title,
   $text,
   $owner,
   $image_path,
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