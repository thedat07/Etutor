<?php
require_once('../config/dbconnector.php');


if (isset($_POST['update_document'])) {
    $id=$_GET['id'];
    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;


    $Title=$_POST['Title'];
    $Content =$_POST['Content'];
    $Id_class=$_POST['Id_class'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="   UPDATE document SET Title='".$Title."',Content='".$Content."',Id_class='".$Id_class."',Document='".$fileName."' WHERE Id = $id";


    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
    } 
} 
?>