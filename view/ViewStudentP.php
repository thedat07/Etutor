<?php
session_start();
if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
  $permission = $_SESSION['permision'];
  $txt1 = "Personal";
  if ($permission != $txt1) {
    echo '<script type="text/javascript">'; 
    echo 'alert("You do not have permission to use this feature! !");'; 
    echo 'window.location.href = "../manager/index.php";';
    echo '</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
         $(".sidebar").toggleClass("collapse");
      });
    });
  </script> 

</head>
<style type="">
</style>
<body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Etutor</div>
      <ul>
        <li>
          <div class="w3-dropdown-hover">
        <div class="user_Profile">
          <i class="fa fa-user"></i>
        </div>
            <div class="w3-dropdown-content w3-bar-block w3-border">
              <div class=" w3-col s12 User_Postition">
                <div class="w3-col s4">
                  <img src="../img/User_Avatar_2.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s6 w3-bar">
                  <span>Welcome: <strong><?php echo strtoupper(htmlentities($_SESSION['username']));?></strong></span><br>
                  <span><?php echo(htmlentities($_SESSION['permision']));?></span><br>
                </div>              
              </div>
              <div class="<?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>"><a class="w3-bar-item w3-button" href="../view/DashbordOfPersonal.php"><i class="fa fa-bar-chart-o"></i> Dashbord</a></div>
              <div class="<?php echo $_SESSION['permision'] == "Student" ? 'show' : 'hidden';?>"><a class="w3-bar-item w3-button" href="../view/DashbordOfStudent.php "><i class="fa fa-bar-chart-o"></i> Dashbord</a></div>
              
              <a class="w3-bar-item w3-button" href="../manager/Account.php"><i class="fa fa-user"></i> View Proflie</a>
              <a class="w3-bar-item w3-button" href="../manager/Logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <?php include('../left/leftbar.php')?>
  <div class="main_container">
        
    <div class="item">
      <div class="panel panel-default">
        <div class="panel-heading">Class show</div>
      </div>
      <div class="w3-container" >
       &nbsp;                               
       <table class="w3-table-all w3-hoverable ">
        <thead >
          <tr class="w3-light-grey">
            <th>Student ID</th>
            <th>Student name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once('../config/dbconnector.php');
          $cn = new DBConnector();
          $id=$_GET['id'];
          $id_Trainer = $_SESSION['id_Trainer'];
          if(isset($_POST['search'])) {
            $valueToSearch = $_POST['valueToSearch'];
            $sql="SELECT * FROM class_student, trainee_manager WHERE class_student.student_id = trainee_manager.id_Trainee and class_id = $id  and class_student.name like  '%".$valueToSearch."%'";
            $rows = $cn->runQuery($sql);
          }
          else{
            $sql="SELECT * FROM class_student, trainee_manager WHERE class_student.student_id = trainee_manager.id_Trainee and class_id = $id ";
            $rows = $cn->runQuery($sql);}
            foreach ($rows as $r) {
              ?>        
              <tr>
                <td><?=$r['student_id']?></td>
                <td><?=$r['name_Trainee']?></td>
                <td>
                  <a href="../view/Calandar.php?id_Trainee=<?=$r['student_id']?>&id_Trainer=<?php echo $id_Trainer ?>" class="Appointment" title="Appointment" data-toggle="tooltip">
                    <i class="material-icons">&#xe8ae;</i>
                  </a>
                  <a href="../manager/messPermision.php?Id_permision=<?php echo $id_Trainer ?>&Id_student=<?=$r['student_id']?>" class="Chat" title="Chat" data-toggle="tooltip"s>
                    <i class="material-icons">&#xe253;</i><span class="badge badge-danger" id="count"></span>
                  </a> 
                </td>
              </tr>
            <?php } ?>
          </tbody>          
        </table>          
      </div>
    </div>
  </div>
</div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
</body>
</html>


