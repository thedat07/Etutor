

<?php
require_once('../config/dbconnector.php');


if (isset($_POST['add_document'])) {

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    $id_document=$_GET['id_document'];
    $id_class=$_GET['id_class'];
    $id_student=$_GET['id_student'];
    $id_tutor=$_GET['id_tutor'];


    $Content =$_POST['Content'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into comment(Content, Document, id_document, id_student, id_class, id_tutor,Name) values('".$Content."','".$fileName."','".$id_document."','".$id_student."','".$id_class."','".$id_tutor."','Permision')";

    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../manager/CommentofPermision.php?id_document='.$id_document.'&id_class='.$id_class.'&id_student='.$id_student.'";';



        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../manager/CommentofPermision.php?id_document='.$id_document.'&id_class='.$id_class.'&id_student='.$id_student.'";';
        echo '</script>';
    } 
}  
?>



