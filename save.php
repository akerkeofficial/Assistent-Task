<?php
$db = mysqli_connect('localhost', 'root', '', 'assistent');


if (isset($_POST['save'])) {
  $id_i = mysqli_real_escape_string($db, $_POST['object_id']);
  $name_i = mysqli_real_escape_string($db, $_POST['names']);
  $sum_i = mysqli_real_escape_string($db, $_POST['sum']);
  // $date = mysqli_real_escape_string($db, $_POST['date']);
  $date_i = date("Y-m-d H:i:s");
  $number_i = mysqli_real_escape_string($db, $_POST['number']);
  $status_i = mysqli_real_escape_string($db, $_POST['Status']);

  $query = "UPDATE object set name='$name_i', sum='$sum_i', number='$number_i', status='$status_i', date='$date_i' where id = '$id_i' ";
  mysqli_query($db, $query);
  echo "success edited";
  
}
?>