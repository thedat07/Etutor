<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_student'])) {
    $class_id=$_POST['class_id'];
    $student_id1=$_POST['student_id1'];
    $student_id2=$_POST['student_id2'];
    $student_id3=$_POST['student_id3'];
    $student_id4=$_POST['student_id4'];
    $student_id5=$_POST['student_id5'];
    $student_id6=$_POST['student_id6'];
    $student_id7=$_POST['student_id7'];
    $student_id8=$_POST['student_id8'];
    $student_id9=$_POST['student_id9'];
    $student_id10=$_POST['student_id10'];


    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    


    $conn1 = new DBConnector();
    $sql1 = "Select * from users WHERE id_Trainee='$student_id1' ";
    $sql2 = "Select * from users WHERE id_Trainee='$student_id2' ";
    $sql3 = "Select * from users WHERE id_Trainee='$student_id3' ";
    $sql4 = "Select * from users WHERE id_Trainee='$student_id4' ";
    $sql5 = "Select * from users WHERE id_Trainee='$student_id5' ";
    $sql6 = "Select * from users WHERE id_Trainee='$student_id6' ";
    $sql7 = "Select * from users WHERE id_Trainee='$student_id7' ";
    $sql8 = "Select * from users WHERE id_Trainee='$student_id8' ";
    $sql9 = "Select * from users WHERE id_Trainee='$student_id9' ";
    $sql10 = "Select * from users WHERE id_Trainee='$student_id10' ";

    $rows1 = $conn1 -> runQuery($sql1);
    $rows2 = $conn1 -> runQuery($sql2);
    $rows3 = $conn1 -> runQuery($sql3);
    $rows4 = $conn1 -> runQuery($sql4);
    $rows5 = $conn1 -> runQuery($sql5);
    $rows6 = $conn1 -> runQuery($sql6);
    $rows7 = $conn1 -> runQuery($sql7);
    $rows8 = $conn1 -> runQuery($sql8);
    $rows9 = $conn1 -> runQuery($sql9);
    $rows10 = $conn1 -> runQuery($sql10);
    require '../PHPMailer-master/PHPMailerAutoload.php';
    foreach($rows1 as $r) {
        $mail1 = new PHPMailer();
        $mail1 ->IsSmtp();
        $mail1 ->SMTPDebug = 0;
        $mail1 ->SMTPAuth = true;
        $mail1 ->SMTPSecure = 'ssl';
        $mail1 ->Host = "smtp.gmail.com";
        $mail1 ->Port = 465;
        $mail1 ->IsHTML(true);
        $mail1 ->Username = "demotestdat07@gmail.com";
        $mail1 ->Password = "demotestdat0712";
        $mail1 ->SetFrom("yourmail@gmail.com");
        $mail1 ->Subject = "Notification";
        $mail1 ->Body = "You have been added to the class id $class_id";
        $mail1 ->AddAddress($r['email']);
        $mail1->Send();
    }   
    foreach($rows2 as $r) {
        $mail2 = new PHPMailer();
        $mail2 ->IsSmtp();
        $mail2 ->SMTPDebug = 0;
        $mail2 ->SMTPAuth = true;
        $mail2 ->SMTPSecure = 'ssl';
        $mail2 ->Host = "smtp.gmail.com";
        $mail2 ->Port = 465;
        $mail2 ->IsHTML(true);
        $mail2 ->Username = "demotestdat07@gmail.com";
        $mail2 ->Password = "demotestdat0712";
        $mail2 ->SetFrom("yourmail@gmail.com");
        $mail2 ->Subject = "Notification";
        $mail2 ->Body = "You have been added to the class id $class_id";
        $mail2 ->AddAddress($r['email']);
        $mail2->Send();
    }
    foreach($rows3 as $r) {        
        $mail3 = new PHPMailer();
        $mail3 ->IsSmtp();
        $mail3 ->SMTPDebug = 0;
        $mail3 ->SMTPAuth = true;
        $mail3 ->SMTPSecure = 'ssl';
        $mail3 ->Host = "smtp.gmail.com";
        $mail3 ->Port = 465;
        $mail3 ->IsHTML(true);
        $mail3 ->Username = "demotestdat07@gmail.com";
        $mail3 ->Password = "demotestdat0712";
        $mail3 ->SetFrom("yourmail@gmail.com");
        $mail3 ->Subject = "Notification";
        $mail3 ->Body = "You have been added to the class id $class_id";
        $mail3 ->AddAddress($r['email']);
        $mail3->Send();
    }
    foreach($rows4 as $r) {
        $mail4 = new PHPMailer();
        $mail4 ->IsSmtp();
        $mail4 ->SMTPDebug = 0;
        $mail4 ->SMTPAuth = true;
        $mail4 ->SMTPSecure = 'ssl';
        $mail4 ->Host = "smtp.gmail.com";
        $mail4 ->Port = 465;
        $mail4 ->IsHTML(true);
        $mail4 ->Username = "demotestdat07@gmail.com";
        $mail4 ->Password = "demotestdat0712";
        $mail4 ->SetFrom("yourmail@gmail.com");
        $mail4 ->Subject = "Notification";
        $mail4 ->Body = "You have been added to the class id $class_id";
        $mail4 ->AddAddress($r['email']);
        $mail4->Send();
    }
    foreach($rows5 as $r) {
        $mail5 = new PHPMailer();
        $mail5 ->IsSmtp();
        $mail5 ->SMTPDebug = 0;
        $mail5 ->SMTPAuth = true;
        $mail5 ->SMTPSecure = 'ssl';
        $mail5 ->Host = "smtp.gmail.com";
        $mail5 ->Port = 465;
        $mail5 ->IsHTML(true);
        $mail5 ->Username = "demotestdat07@gmail.com";
        $mail5 ->Password = "demotestdat0712";
        $mail5 ->SetFrom("yourmail@gmail.com");
        $mail5 ->Subject = "Notification";
        $mail5 ->Body = "You have been added to the class id $class_id";
        $mail5 ->AddAddress($r['email']);
        $mail5->Send();
    }
    foreach($rows6 as $r) {
        $mail6 = new PHPMailer();
        $mail6 ->IsSmtp();
        $mail6 ->SMTPDebug = 0;
        $mail6 ->SMTPAuth = true;
        $mail6 ->SMTPSecure = 'ssl';
        $mail6 ->Host = "smtp.gmail.com";
        $mail6 ->Port = 465;
        $mail6 ->IsHTML(true);
        $mail6 ->Username = "demotestdat07@gmail.com";
        $mail6 ->Password = "demotestdat0712";
        $mail6 ->SetFrom("yourmail@gmail.com");
        $mail6 ->Subject = "Notification";
        $mail6 ->Body = "You have been added to the class id $class_id";
        $mail6 ->AddAddress($r['email']);
        $mail6->Send();
    }
    foreach($rows7 as $r) {
        $mail7 = new PHPMailer();
        $mail7 ->IsSmtp();
        $mail7 ->SMTPDebug = 0;
        $mail7 ->SMTPAuth = true;
        $mail7 ->SMTPSecure = 'ssl';
        $mail7 ->Host = "smtp.gmail.com";
        $mail7 ->Port = 465;
        $mail7 ->IsHTML(true);
        $mail7 ->Username = "demotestdat07@gmail.com";
        $mail7 ->Password = "demotestdat0712";
        $mail7 ->SetFrom("yourmail@gmail.com");
        $mail7 ->Subject = "Notification";
        $mail7 ->Body = "You have been added to the class id $class_id";
        $mail7 ->AddAddress($r['email']);
        $mail7->Send();
    }
    foreach($rows8 as $r) {
        $mail8 = new PHPMailer();
        $mail8 ->IsSmtp();
        $mail8 ->SMTPDebug = 0;
        $mail8 ->SMTPAuth = true;
        $mail8 ->SMTPSecure = 'ssl';
        $mail8 ->Host = "smtp.gmail.com";
        $mail8 ->Port = 465;
        $mail8 ->IsHTML(true);
        $mail8 ->Username = "demotestdat07@gmail.com";
        $mail8 ->Password = "demotestdat0712";
        $mail8 ->SetFrom("yourmail@gmail.com");
        $mail8 ->Subject = "Notification";
        $mail8 ->Body = "You have been added to the class id $class_id";
        $mail8 ->AddAddress($r['email']);
        $mail8->Send();
    }
    foreach($rows9 as $r) {
        $mail9 = new PHPMailer();
        $mail9 ->IsSmtp();
        $mail9 ->SMTPDebug = 0;
        $mail9 ->SMTPAuth = true;
        $mail9 ->SMTPSecure = 'ssl';
        $mail9 ->Host = "smtp.gmail.com";
        $mail9 ->Port = 465;
        $mail9 ->IsHTML(true);
        $mail9 ->Username = "demotestdat07@gmail.com";
        $mail9 ->Password = "demotestdat0712";
        $mail9 ->SetFrom("yourmail@gmail.com");
        $mail9 ->Subject = "Notification";
        $mail9 ->Body = "You have been added to the class id $class_id";
        $mail9 ->AddAddress($r['email']);
        $mail9->Send();
    }
    foreach($rows10 as $r) {      
        $mail10 = new PHPMailer();
        $mail10 ->IsSmtp();
        $mail10 ->SMTPDebug = 0;
        $mail10 ->SMTPAuth = true;
        $mail10 ->SMTPSecure = 'ssl';
        $mail10 ->Host = "smtp.gmail.com";
        $mail10 ->Port = 465;
        $mail10 ->IsHTML(true);
        $mail10 ->Username = "demotestdat07@gmail.com";
        $mail10 ->Password = "demotestdat0712";
        $mail10 ->SetFrom("yourmail@gmail.com");
        $mail10 ->Subject = "Notification";
        $mail10 ->Body = "You have been added to the class id $class_id";
        $mail10 ->AddAddress($r['email']);
        $mail10->Send();
    }




    $sq1 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id1."')";
    $sq2 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id2."')";
    $sq3 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id3."')";
    $sq4 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id4."')";
    $sq5 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id5."')";
    $sq6 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id6."')";
    $sq7 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id7."')";
    $sq8 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id8."')";
    $sq9 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id9."')";
    $sq10 = "Insert Into class_student( class_id, student_id) values('".$class_id."','".$student_id10."')";
    $cn = new DBConnector();
    $cn2 = new DBConnector();
    $cn3 = new DBConnector();
    $cn4 = new DBConnector();
    $cn5 = new DBConnector();
    $cn6 = new DBConnector();
    $cn7 = new DBConnector();
    $cn8 = new DBConnector();
    $cn9 = new DBConnector();
    $cn10 = new DBConnector();
    $return1 = $cn->execStatement($sq1);
    $return2 = $cn2->execStatement($sq2);
    $return3 = $cn3->execStatement($sq3);
    $return4 = $cn4->execStatement($sq4);
    $return5 = $cn5->execStatement($sq5);
    $return6 = $cn6->execStatement($sq6);
    $return7 = $cn7->execStatement($sq7);
    $return8 = $cn8->execStatement($sq8);
    $return9 = $cn9->execStatement($sq9);
    $return10 = $cn10->execStatement($sq10);
    if ($return1==0 && $return2==0 && $return3==0 && $return4==0 && $return5==0 && $return6==0 && $return7==0 && $return8==0 && $return9==0 && $return10==0 ){

        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/Classinfo.php?id='.$class_id.'";';
        echo '</script>';

    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/Classinfo.php?id='.$class_id.'";';
        echo '</script>';
    } 

} 


?>


