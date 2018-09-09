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

  $query = "DELETE from object  where id = '$id_i' ";
  mysqli_query($db, $query);
  echo "success deleted";
}
?>