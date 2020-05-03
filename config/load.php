<?php
$connect = new PDO('mysql:host=localhost;dbname=id9817382_fpt', 'root', '');

$data = array();

$id_tutor=$_GET['id_tutor']; 
$id_student=$_GET['id_student']; 

$query = "SELECT * FROM events where id_tutor='".$id_tutor."' and id_student='".$id_student."'  ORDER BY id";

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