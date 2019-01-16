<?php
//https://www.phpknowhow.com/mysql/mysqli-procedural-functions/
include ("../db_connection.php");
include ("../ChromePhp.class.php");
date_default_timezone_set('America/Lima');

$sql = "SELECT * FROM tb_student ";
$result = mysqli_query($connection, $sql);

//ChromePhp::log($result_array);
?>


<tbody>
  <?php

   //foreach($result_array as $row){
   while($row = mysqli_fetch_array($result)) {
   ?>

  <tr>
   <td><?php echo utf8_encode($row[0]); ?></td>
   <td><?php echo utf8_encode($row[1]); ?></td>
   <td><?php echo utf8_encode($row[2]); ?></td>

  </tr>

 <?php } ?>
</tbody>
