<?php

$target_dir = "docs/";
$target_file = $target_dir.basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"]))
{
  $check = getfile
}
?>
