<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');

if(isset($_POST["id"]))
{
	$id_tutor=$_GET['id_tutor']; 
	$id_student=$_GET['id_student']; 
	$query = "
	UPDATE events 
	SET title=:title, start_event=:start_event, end_event=:end_event 
	WHERE id=:id and id_tutor='".$id_tutor."' and id_student='".$id_student."'
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