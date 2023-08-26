<?php

    define('MB',1048576);
    // security configuration against xxs
    function filterRequest($requestname){
        return htmlspecialchars(strip_tags($requestname));
    }

    function imageUpload($imageRequest,$customName)
    {
        global $msgError;
        $imagename = $imageRequest['name'];
        $imagetmp = $imageRequest['tmp_name'];
        $imagesize = $imageRequest['size'];
        $allowExt = array('jpg','png','gif','jpeg');
        $strToArray = explode('.',$imagename);
        $ext = end($strToArray);

        if(!empty($imagename) && !in_array($ext , $allowExt)){
            $msgError[] = "Ext";
        }
        if($imagesize > MB * 10){
            $msgError[] = "size";
        }

        if(empty($msgError)){
            move_uploaded_file($imagetmp,"../upload/". $customName.'.'.$ext);
            return $customName.'.'.$ext;
        }else{
            print_r($msgError);
            return "fail";
        }
    }

    function imageDelete($dir,$name){
        $image_path = $dir.'/'.$name;
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
?>