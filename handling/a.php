    $sql10="select * from trainee_manager where id_Trainee='$student_id10'";
    $kt=mysqli_query($conn, $sql10);
    if(mysqli_num_rows($kt)  > 0){



        $sql = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id10."')";
        $cn = new DBConnector();
        $return = $cn->execStatement($sql);
        if ($return==0){

            echo '<script type="text/javascript">'; 
            echo 'alert("Add Failure!");'; 
            echo 'window.location.href = "../manager/AddStudent.php";';
            echo '</script>';

        }else{ 
            echo '<script type="text/javascript">';     
            echo 'alert("Add Success!");'; 
            echo 'window.location.href = "../manager/AddStudent.php";';
            echo '</script>';
        } 

    } 
    else{

        echo '<script type="text/javascript">'; 
        echo 'alert("Not ID student!");'; 
        echo 'window.location.href = "../manager/AddStudent.php";';
        echo '</script>';
    }
