<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');

if(isset($_POST["id"]))
{
	$id_Trainer=$_GET['id_Trainer']; 
	$id_Trainee=$_GET['id_Trainee']; 
	$query = "
	UPDATE events 
	SET title=:title, start_event=:start_event, end_event=:end_event 
	WHERE id=:id and id_Trainer='".$id_Trainer."' and id_Trainee='".$id_Trainee."'
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':title'  => $_POST['title'],
			':start_event' => $_POST['start'],
			':end_event' => $_POST['end'],
			':id'   => $_POST['id']
		)
	);
}

?>