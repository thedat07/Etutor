

<?php
require_once('../config/dbconnector.php');


if (isset($_POST['add_document'])) {

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;


    $Title=$_POST['Title'];
    $Content =$_POST['Content'];
    $Id_class=$_POST['Id_class'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into document(Title, Content, Document,Id_class) values('".$Title."','".$Content."','".$fileName."','".$Id_class."')";

    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
    } 
} 
else{
    $id=$_GET['id'];
    $Id_class=$_GET['Id_class'];
    $sql="DELETE FROM document WHERE Id = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';     
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/ViewClassPermision.php?id='.$Id_class.'";';
        echo '</script>';
    } 
} 

?>



