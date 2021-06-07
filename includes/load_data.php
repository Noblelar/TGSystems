<?php

//include "./database.php";
//$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$connect1 = mysqli_connect("localhost", "root", "", "cwa");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "
  SELECT * FROM institutions 
  ORDER BY inst_id ASC
  ";
 /* $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  */
  $data = mysqli_query($connect1, $query);
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["inst_id"],
    'name'  => $row["Inst_name"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "
  SELECT * FROM programs 
  WHERE inst_id = '".$_POST["category_id"]."' 
  ORDER BY program_id ASC
  ";
  /*
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
*/
  $data = mysqli_query($connect1, $query);

  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["program_id"],
    'name'  => $row["program_name"]
   );
  }
  echo json_encode($output);
 }
}
