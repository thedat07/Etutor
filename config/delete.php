<?php


if(isset($_POST["id"]))
{

	$id_Trainer=$_GET['id_Trainer']; 
	$id_Trainee=$_GET['id_Trainee']; 

	$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');
	$query = "
	DELETE from events WHERE id=:id and id_Trainer='".$id_Trainer."' and id_Trainee='".$id_Trainee."'
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':id' => $_POST['id']
		)
	);
}

?>