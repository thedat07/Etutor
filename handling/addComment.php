

<?php
require_once('../config/dbconnector.php');


if (isset($_POST['add_document'])) {

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    $id=$_GET['id'];
    $id_class=$_GET['id_class'];
    $id_student=$_GET['id_student'];

    $Content =$_POST['Content'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into comment(Content, Document,id_document,id_student,id_class,Name) values('".$Content."','".$fileName."','".$id."','".$id_student."','".$id_class."','Student')";

    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../manager/Comment.php?id='.$id.'&id_class='.$id_class.'";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../manager/Comment.php?id='.$id.'&id_class='.$id_class.'";';
        echo '</script>';
    } 
}  
?>



