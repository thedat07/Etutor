<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location:../manager/login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Meeting</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
	<script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>
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
				<div class="panel-heading">Metting</div>
			</div>
			<div class="w3-container" >
				<input id="txt-roomid" placeholder="Unique Room ID">
				<button id="btn-open-or-join-room"  class="btn btn-success ">Open or Join Room</button>
				<hr>
				<div id="local-videos-container">
				</div>
				<hr>
				<div id="remote-videos-container">
				</div>
				<script>
					var connection = new RTCMultiConnection();
					
					connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';
					
					connection.socketMessageEvent = 'audio-conference-demo';

					connection.session = {
						audio: true,
						video: false
					};

					connection.mediaConstraints = {
						audio: true,
						video: false
					};

					connection.sdpConstraints.mandatory = {
						OfferToReceiveAudio: true,
						OfferToReceiveVideo: false
					};
					var localvideoContainer = document.getElementById('local-videos-container');
					var remotevideoContainer = document.getElementById('remote-videos-container');
					connection.onstream = function(event) {
						var video = event.mediaElement;
						if(event.type == 'local'){
							localvideoContainer.appendChild(video);
						}
						if(event.type == 'remote'){
							remotevideoContainer.appendChild(video);
						}
					};
					var roomid = document.getElementById('txt-roomid');
					roomid.value= connection.token();
					document.getElementById('btn-open-or-join-room').onclick = function(){
						this.disnabled = true;
						connection.openOrJoin(roomid.value || 'predefined-roomid');
					}
				</script>
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


