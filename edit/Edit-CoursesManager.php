<?php
session_start();

if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
  $permission = $_SESSION['permision'];
  $txt1 = "Admin";
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
  <title>HomePage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="../js/index.js"></script>
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
        <div class="panel-heading">Courses categories show</div>
          <div class="panel-body">
            <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $id=$_GET['id'];
              $sql="Select * from course_manager where id_Course_manager = $id";  
              $rows = $cn->runQuery($sql);                       
              foreach ($rows as $r) 
            {
            ?> 

            <form action="../handling/handlingCourse.php?id=<?=$r['id_Course_manager']?>" method="post" enctype="MULTIPLE/form-data">
              <div class="form-group">
                <label >Name:</label>
                <input type="text" class="form-control" placeholder="Name Courses" name="name_Courses" value="<?=$r['name_Courses']?>" required>
              </div>
              <div class="form-group">
                <label for="comment">Descriptions:</label>
                <textarea class="form-control" rows="5" cols="65" id="comment" name="descriptions_Courses"><?=$r['descriptions_Courses']?></textarea>
              </div>  
              <div class="form-group">
                <label>Category:</label>
                <td>
                  <select class="form-control" id="exampleFormControlSelect1" name="id_Courses_categories">

                    <?php 
                    require_once('../config/dbconnector.php');
                    $conn = new DBConnector();
                    $id=$_GET['id'];
                    $sql = "Select course_manager.id_Courses_categories , courses_categories_manager.name_category FROM course_manager INNER JOIN courses_categories_manager ON course_manager.id_Courses_categories=courses_categories_manager.id_Courses_categories where id_Course_manager = $id ";
                    $rows = $conn -> runQuery($sql);
                    foreach($rows as $r) {
                     ?>
                     <option value="<?=$r['id_Courses_categories']?>"><?=$r['name_category']?></option>
                   <?php }?>
                   <?php 
                   require_once('../config/dbconnector.php');
                   $conn = new DBConnector();
                   $sql = "Select * from courses_categories_manager";
                   $rows = $conn -> runQuery($sql);
                   foreach($rows as $r) {
                     ?>
                     <option value="<?=$r['id_Courses_categories']?>"><?=$r['name_category']?></option>
                   <?php }?>
                 </select>                
               </td>
             </div>
             <div class="input-group col-md-6">        
              <input type="submit" class="btn " name="update_Courses" id="update_Courses" value="Update">
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
</body>
</html>


