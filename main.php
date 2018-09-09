<?php

$db = mysqli_connect('localhost', 'root', '', 'assistent');

// LOGIN USER
if (isset($_POST['access'])) {
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $errors = array();
  if (empty($login)) {
    array_push($errors, "login is required");
    echo "login is required";
  }
  if (empty($password)) {
    array_push($errors, "password is required");
    echo "password is required";
  }

  if (count($errors) == 0) {
   
    $query = "SELECT * FROM admin WHERE login='$login' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      
      $_SESSION['success'] = "You are now logged in";
      header('location: next.php');
      echo "good";
    }else {
      array_push($errors, "Wrong login/password combination");
      echo "baf";
    }
  }
}
?>

<?php
if (isset($_POST['send'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $sum = mysqli_real_escape_string($db, $_POST['sum']);
  // $date = mysqli_real_escape_string($db, $_POST['date']);
  $date = date("Y-m-d H:i:s");
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $status = mysqli_real_escape_string($db, $_POST['Status']);

  $query = "INSERT INTO object (name, sum, number, date, status) 
          VALUES('$name', '$sum', '$number', '$date', '$status')";
    mysqli_query($db, $query);
    echo "success";
}


?>
