<?php

$currentDirectory =  getcwd();
$uploadDirectory  = "./docs/";

$errors = [];

$fileextensionsAllowed  = ['pdf','doc']; //these will be the only file extensions allowed

$fileName = $_FILES['the_file']['name'];
$fileSize = $_FILES['the_file']['size'];
$fileTmpName = $_FILES['the_file']['tmp_name'];
$fileExtension = $_FILES['the_file']['type'];
$fileExt = explode('.',$fileName);
$fileExten = end($fileExt);
$fileExtension = strtolower($fileExten);

$uploadPath = $currentDirectory.$uploadDirectory.basename($fileName);

if(isset($_POST['submit']))
{
    if(!in_array($fileExtension,$fileextensionsAllowed))
    {
        $errors[] = "This file extension is not allowed , please upload a jpeg  and png file \n";
    }
    if($fileSize > 4000000)
    {
        $errors[] = "File exceeds maximum  size (4mb)\n";
    }
    if(empty($errors))
    {
        $didupload = move_uploaded_file($fileTmpName,$uploadPath);

        if($didupload)
        {
            echo "The file ".basename($fileName). " has been uploaded ";
        }
        else {
            echo "An error occured  Please contact the admininistrator";
        }
    }else{
        foreach ($errors as $error)
        {
            echo $error."these are the errors \n";
        }
    }
}
?>
