

<?php
require_once('../config/dbconnector.php');


if (isset($_POST['add_document'])) {

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    $id_document=$_GET['id_document'];
    $id_class=$_GET['id_class'];
    $id_trainee=$_GET['id_trainee'];
    $id_Trainer=$_GET['id_Trainer'];


    $Content =$_POST['Content'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into comment(Content, Document, id_document, id_trainee, id_class, id_Trainer,Name) values('".$Content."','".$fileName."','".$id_document."','".$id_trainee."','".$id_class."','".$id_Trainer."','Permision')";

    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../manager/CommentofPermision.php?id_document='.$id_document.'&id_class='.$id_class.'&id_trainee='.$id_trainee.'";';



        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../manager/CommentofPermision.php?id_document='.$id_document.'&id_class='.$id_class.'&id_trainee='.$id_trainee.'";';
        echo '</script>';
    } 
}  
?>



