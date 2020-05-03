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
  <title>Edit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="col-md-10">   
      <div class="panel panel-default">
        <div class="panel-heading">Register Add</div>
          <div class="panel-body">

            <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $id=$_GET['id'];
              $sql="Select * from users where id = $id";  
              $rows = $cn->runQuery($sql);                       
              foreach ($rows as $r) 
            {
            ?> 

            <form action="../handling/handingRegisterStudent.php?id=<?=$r['id']?>" method="post" enctype="MULTIPLE/form-data">
              <div class="form-group">
                <label >username:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" ></i></span>
                  <input type="text" class="form-control"  name="username"  value="<?=$r['username']?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="comment">password:</label>
                <div class=" input-group" >
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" placeholder="password" name="password" id="myInput" value="<?=$r['password']?>" required>
                  <div class="input-group-btn" >
                    <button class="form-control" type="button" class="btn" onclick="myFunction()" id="display_advance">
                      <span class="fa fa-eye"></span>
                    </button>
                  </div>
                </div>
              </div>  
              <div class="form-group">
                <label >Name:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" value="<?=$r['name']?>"></i></span>
                  <input type="text" class="form-control"  name="name"  id="name" value="<?=$r['name']?>" required>
                </div>
              </div>

              <div class="form-group">
                <label >Email:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope" value="<?=$r['email']?>"></i></span>
                  <input type="text" class="form-control"  name="email" id="email" value="<?=$r['email']?>" required>
                </div>
              </div>

              <div class="form-group">
                <label >Id student:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-id-badge" value="<?=$r['id_student']?>"></i></span>
                  <input type="text" class="form-control"  name="id_student" id="id_student" value="<?=$r['id_student']?>" required>
                </div>
              </div>


              <div class="form-group">
                <label>permision:</label>
                <td>
                  <select class="form-control" id="exampleFormControlSelect1" name="permision">
                    <option value="<?=$r['permision']?>" select><?=$r['permision']?></option>
                  </select>                
                </td>
              </div>
              <div class="input-group "> 
                <input type="submit" class="btn " name="update_Register" id="update_Register" value="Update">
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


