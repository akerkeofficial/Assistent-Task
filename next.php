<?php
$db = mysqli_connect('localhost', 'root', '', 'assistent');
$sql2 = "SELECT * FROM object";
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

<div class="row">

    <?php

    for($i=0;$i<sizeof($id);$i++){ ?>
      <div class="col-sm-6"> <?php
      echo "Наименование товара: ".$name[$i]."<br>";
      echo "Сумма: ".$sum[$i]."<br>";
      echo "Телефон продавца: ".$number[$i]."<br>";
      echo "Дата: ".$date[$i]."<br>";
      echo "Статус: ".$status[$i]."<br>";
      echo "<a href='edit.php?var=$id[$i]'>редактировать</a><br>";
      echo "<a href='delete.php?var=$id[$i]'>удалить</a><br>";
       ?>
       <br>
      </div>
    <?php } ?>
    </div>

