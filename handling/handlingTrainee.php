<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Trainee'])) {
        //them
    $name_student=$_POST['name_student'];
    $education_student=$_POST['education_student'];
    $age_student=$_POST['age_student'];
    $TOEIC_score_student=$_POST['TOEIC_score_student'];
    $DoB_student=$_POST['DoB_student'];
    $location_student=$_POST['location_student'];

    $sql="Insert Into student_manager(name_student, education_student, age_student, TOEIC_score_student, DoB_student, location_student) values('".$name_student."','".$education_student."','".$age_student."','".$TOEIC_score_student."','".$DoB_student."','".$location_student."')";
    
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
    $name_student=$_POST['name_student'];
    $education_student=$_POST['education_student'];
    $age_student=$_POST['age_student'];
    $TOEIC_score_student=$_POST['TOEIC_score_student'];
    $DoB_student=$_POST['DoB_student'];
    $location_student=$_POST['location_student'];

    $sql = "UPDATE student_manager SET name_student = '".$name_student."', education_student = '".$education_student."', age_student = '".$age_student."', TOEIC_score_student = '".$TOEIC_score_student."', DoB_student = '".$DoB_student."', location_student = '".$location_student."' WHERE id_student = $id"; 
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
    $sql="DELETE FROM student_manager WHERE id_student = $id";
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
