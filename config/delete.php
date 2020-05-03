<?php

if(isset($_POST["id"]))
{

	$id_tutor=$_GET['id_tutor']; 
	$id_student=$_GET['id_student']; 

	$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');
	$query = "
	DELETE from events WHERE id=:id and id_tutor='".$id_tutor."' and id_student='".$id_student."'
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':id' => $_POST['id']
		)
	);
}

?>