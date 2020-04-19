<?php
require_once('../config/dbconnector.php');
if (isset($_POST['Add'])) {
        //them
    $id=$_GET['id']; 
    $Id_student =$_POST['Id_student'];

    $sql="Insert Into mess(id_trainer , id_trainee, info ) values('".$id."','".$Id_student."','Permision')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/ViewMess.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/ViewMess.php";';
        echo '</script>';
    } 
} 
elseif (isset($_POST['Add_S'])) {
        //them
    $id=$_GET['id']; 
    $Id_Permision =$_POST['Id_Permision'];

    $sql="Insert Into mess(id_trainee , id_trainer, info ) values('".$id."','".$Id_Permision."','Student')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/ViewMessStudent.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/ViewMessStudent.php";';
        echo '</script>';
    } 
} 
?>
