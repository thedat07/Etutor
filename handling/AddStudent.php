<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_student'])) {
        //them
    $class_id=$_POST['class_id'];
    $student_id=$_POST['student_id'];

    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    $conn1 = new DBConnector();
    $sql1 = "Select * from users WHERE id_Trainee='$student_id' ";
    $rows1 = $conn1 -> runQuery($sql1);
    foreach($rows1 as $r) {
        require '../PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465;
        $mail ->IsHTML(true);
        $mail ->Username = "demotestdat07@gmail.com";
        $mail ->Password = "demotestdat0712";
        $mail ->SetFrom("yourmail@gmail.com");
        $mail ->Subject = "Notification";
        $mail ->Body = "You have been added to the class id $class_id";
        $mail ->AddAddress($r['email']);
        $mail->Send();

    }




    $sql="select * from trainee_manager where id_Trainee='$student_id'";
    $kt=mysqli_query($conn, $sql);


    if(mysqli_num_rows($kt)  > 0){



        $sql = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id."')";
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

}
?>


