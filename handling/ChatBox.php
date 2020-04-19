<?php
require_once('../config/dbconnector.php');
if (isset($_POST['Add'])) {
        //them
    $Id_permision=$_GET['Id_permision'];
    $Id_student=$_GET['Id_student'];
    $Content =$_POST['Content'];

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
     move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into mess(id_trainer , id_trainee, mess, info, Document ) values ('".$Id_permision."','".$Id_student."','".$Content."','Permision', '".$fileName."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = ".../manager/messPermision.php?Id_permision='.$Id_permision.'&Id_student='.$Id_student.'";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'window.location.href = "../manager/messPermision.php?Id_permision='.$Id_permision.'&Id_student='.$Id_student.'";';
        echo '</script>';
    } 
} 
if (isset($_POST['Add_Student'])) {
        //them
    $Id_permision=$_GET['Id_permision'];
    $Id_student=$_GET['Id_student'];
    $Content =$_POST['Content'];

    $statusMsg = '';
    $targetDir = "../upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
     move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    $sql="Insert Into mess(id_trainer , id_trainee, mess, info, Document  ) values ('".$Id_permision."','".$Id_student."','".$Content."','Student','".$fileName."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = ".../manager/messStudent.php?Id_permision='.$Id_permision.'&Id_student='.$Id_student.'";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'window.location.href = "../manager/messStudent.php?Id_permision='.$Id_permision.'&Id_student='.$Id_student.'";';
        echo '</script>';
    } 
} 
?>
