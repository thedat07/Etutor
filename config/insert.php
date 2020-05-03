
<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');


if(isset($_POST["title"]))
{
	$id_tutor=$_GET['id_tutor']; 
	$id_student=$_GET['id_student']; 
	$query = "
	INSERT INTO events 
	(title, start_event, end_event,id_tutor,id_student) 
	VALUES (:title, :start_event, :end_event,'".$id_tutor."','".$id_student."')
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

