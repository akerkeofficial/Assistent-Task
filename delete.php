
<?php
$db = mysqli_connect('localhost', 'root', '', 'assistent');


$ids=$_GET['var'];
$sql2 = "SELECT * FROM object where id = '$ids'";
    $result=$db->query($sql2);


   if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
      	$id[]=$row['id'];
        $name[]=$row['name'];
        $sum[]=$row['sum'];
        $number[]=$row['number'];
        $date[]=$row['date'];
        $status[]=$row['status'];
        
      }
    }
?>


    <?php

    for($i=0;$i<sizeof($id);$i++){ ?>
      <form method="post" action="del.php?var=$ids"> <?php
      echo "ID товара: "."<input type='text' name='object_id' value='$id[$i]'><br>";
      echo "Наименование товара: "."<input type='text' name='names' value='$name[$i]'><br>";
      echo "Сумма: "."<input type='text' name='sum' value='$sum[$i]'><br>";
      echo "Телефон продавца: "."<input type='text' name='number' value='$number[$i]'><br>";
      echo "Дата: "."<input type='text' name='date' value='$date[$i]'><br>";
      echo "Статус: "."<input type='text' name='Status' value='$status[$i]'><br>";
      echo "<input type='submit' value='удалить' name='save'>";


       ?>
       
    <?php } ?>
    <br>
      </form>
<?php

if (isset($_POST['save'])) {
  $name_i = mysqli_real_escape_string($db, $_POST['names']);
  $sum_i = mysqli_real_escape_string($db, $_POST['sum']);
  // $date = mysqli_real_escape_string($db, $_POST['date']);
  $date_i = date("Y-m-d H:i:s");
  $number_i = mysqli_real_escape_string($db, $_POST['number']);
  $status_i = mysqli_real_escape_string($db, $_POST['Status']);

  $query = "UPDATE object set name='$name_i', sum='$sum_i', number='$number_i', status='$status_i', date='$date_i' where id = '$ids";
  mysqli_query($db, $query);
  
}
?>