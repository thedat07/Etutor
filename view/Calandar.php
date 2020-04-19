<?php
session_start();
$id_Trainee=$_GET['id_Trainee'];
$id_Trainer=$_GET['id_Trainer'];
if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
  $permission = $_SESSION['permision'];
  $txt1 = "Student";
  $txt2 = "Personal";
  if ($permission != $txt1 && $permission != $txt2 ) {
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
  <title>Calandar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


    <script>
   
    $(document).ready(function() {
     var calendar = $('#calendar').fullCalendar({
      editable:true,
      header:{
       left:'prev,next today',
       center:'title',
       right:'month,agendaWeek,agendaDay'
     },
     events: '../config/load.php?id_Trainee=<?php echo $id_Trainee ?>&id_Trainer=<?php echo $id_Trainer ?>',
     selectable:true,
     selectHelper:true,
     select: function(start, end, allDay)
     {
       var title = prompt("Enter Event Title");
       if(title)
       {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
        $.ajax({
         url:"../config/insert.php?id_Trainee=<?php echo $id_Trainee ?>&id_Trainer=<?php echo $id_Trainer ?>",
         type:"POST",
         data:{title:title, start:start, end:end},
         success:function()
         {
          calendar.fullCalendar('refetchEvents');
          alert("Added Successfully");
        }
      })
      }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"../config/update.php?id_Trainee=<?php echo $id_Trainee ?>&id_Trainer=<?php echo $id_Trainer ?>",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
     }
   })
   },

   eventDrop:function(event)
   {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"../config/update.php?id_Trainee=<?php echo $id_Trainee ?>&id_Trainer=<?php echo $id_Trainer ?>",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
     }
   });
   },

   eventClick:function(event)
   {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"../config/delete.php?id_Trainee=<?php echo $id_Trainee ?>&id_Trainer=<?php echo $id_Trainer ?>",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
      }
    })
    }
  },

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
        <div class="panel-heading">Calandar</div>
      </div>
      <div class="w3-container" >
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
         $(".sidebar").toggleClass("collapse");
      });
    });
  </script>  

</body>
</html>


