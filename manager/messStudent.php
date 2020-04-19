<?php
session_start();

if (!isset($_SESSION['username'])) {
	header('Location:../manager/login.php');
} else
{
	$permission = $_SESSION['permision'];
	$txt1 = "Student";
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
  <title>Student chat box</title>
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
  				<div class="panel-heading">Chat Box</div>
  			</div>

  			<?php 
  			$Id_permision=$_GET['Id_permision'];
  			$Id_student=$_GET['Id_student'];
  			echo '<form action="../handling/ChatBox.php?Id_permision='.$Id_permision.'&Id_student='.$Id_student.'" method="post" enctype="multipart/form-data">';
  			?>
  	

  			<div class="Scroll" >

  				<?php 
  				require_once('../config/dbconnector.php');
  				$cn = new DBConnector();
  				$Id_permision=$_GET['Id_permision'];
  				$Id_student=$_GET['Id_student'];
  				$sql="SELECT * FROM mess WHERE  id_trainer=$Id_permision and id_trainee=$Id_student ORDER BY Time DESC";
  				$rows = $cn->runQuery($sql);
  				foreach ($rows as $r) {

  				?>
  				<div class="Mess_box" >
            <p>Content: <?=$r['mess']?></p>
            <p class="Info"><?=$r['info']?></p>
            <p><a href="../upload/<?=$r['Document']?>" download><?=$r['Document']?></a></p>
            <p class="Time">Time:<?=$r['Time']?></p>
  				</div> 


  				<?php } ?>

  			</div>
  			<br>


  				<textarea  rows="2" cols="99" name="Content" style="color: black"></textarea>

      <div class="form-group">
        <div class="input-group">
          <input type="file" name="file">
        </div> 
      </div>
  		
  		<div class="input-group ">   
  			<input type="submit" class="btn btn-success" name="Add_Student" id="Add_Student" value="Send">
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
<?php 

require_once('../config/dbconnector.php');
$Id_student = $_GET['Id_student'];
$Id_permision=$_GET['Id_permision'];
$sql="INSERT INTO logchatbox(id_Trainer,id_Trainee,checkP) VALUES ('".$Id_permision."','".$Id_student."','1')";
$cn = new DBConnector();
$return = $cn->execStatement($sql);


?>


