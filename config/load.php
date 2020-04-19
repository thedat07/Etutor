<?php


$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');

$data = array();

$id_Trainer=$_GET['id_Trainer']; 
$id_Trainee=$_GET['id_Trainee']; 

$query = "SELECT * FROM events where id_Trainer='".$id_Trainer."' and id_Trainee='".$id_Trainee."'  ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>