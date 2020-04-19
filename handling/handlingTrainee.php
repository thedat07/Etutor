<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Trainee'])) {
        //them
    $name_Trainee=$_POST['name_Trainee'];
    $education_Trainee=$_POST['education_Trainee'];
    $age_Trainee=$_POST['age_Trainee'];
    $TOEIC_score_Trainee=$_POST['TOEIC_score_Trainee'];
    $DoB_Trainee=$_POST['DoB_Trainee'];
    $location_Trainee=$_POST['location_Trainee'];

    $sql="Insert Into trainee_manager(name_Trainee, education_Trainee, age_Trainee, TOEIC_score_Trainee, DoB_Trainee, location_Trainee) values('".$name_Trainee."','".$education_Trainee."','".$age_Trainee."','".$TOEIC_score_Trainee."','".$DoB_Trainee."','".$location_Trainee."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
    } 
} 
elseif (isset($_POST['update_Trainee'])) {

    $id=$_GET['id'];    
    $name_Trainee=$_POST['name_Trainee'];
    $education_Trainee=$_POST['education_Trainee'];
    $age_Trainee=$_POST['age_Trainee'];
    $TOEIC_score_Trainee=$_POST['TOEIC_score_Trainee'];
    $DoB_Trainee=$_POST['DoB_Trainee'];
    $location_Trainee=$_POST['location_Trainee'];

    $sql = "UPDATE trainee_manager SET name_Trainee = '".$name_Trainee."', education_Trainee = '".$education_Trainee."', age_Trainee = '".$age_Trainee."', TOEIC_score_Trainee = '".$TOEIC_score_Trainee."', DoB_Trainee = '".$DoB_Trainee."', location_Trainee = '".$location_Trainee."' WHERE id_Trainee = $id"; 
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);

    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
    } 

}
else{
    $id=$_GET['id'];
    $sql="DELETE FROM trainee_manager WHERE id_Trainee = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);    
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/TraineeManager.php";';
        echo '</script>';
    }
}
?>
