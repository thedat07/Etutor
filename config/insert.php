
<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');


if(isset($_POST["title"]))
{
	$id_Trainer=$_GET['id_Trainer']; 
	$id_Trainee=$_GET['id_Trainee']; 
	$query = "
	INSERT INTO events 
	(title, start_event, end_event,id_Trainer,id_Trainee) 
	VALUES (:title, :start_event, :end_event,'".$id_Trainer."','".$id_Trainee."')
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':title'  => $_POST['title'],
			':start_event' => $_POST['start'],
			':end_event' => $_POST['end']
		)
	);
}

