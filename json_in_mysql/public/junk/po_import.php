<?php
include ("ChromePhp.class.php");
include ("db_connection.php");
date_default_timezone_set('Australia/Sydney');

//to clear down records
$sql_uno = "DELETE FROM tb_po_line WHERE purchase_order_id <> ''";
$result = mysqli_query($connection, $sql_uno);
//add dummy dataType
//$sql = "INSERT INTO tb_po_line (purchase_order_line_id) VALUES ('yoshio') ";
//$result = mysqli_query($connection, $sql);


if(!empty($_FILES['csv_file']['name'])){

  $file_data = fopen($_FILES['csv_file']['name'], 'r');
  fgetcsv($file_data);


    while($row = fgetcsv($file_data)) {
        $data[] = array(
          //'purchase_order_line_id' => $row[0],
          //'purchase_order_id' => $row[1],
          //'po_supplier' => $row[2],
          //'sku_code' => $row[3],
          'sku_description' => $row[4],
          //'purchase_order_line_state' => $row[5],
          //'state_change_time' => $row[6],
          //'ordered_qty' => $row[7],
          //'received_qty' => $row[8],
          //'receiving_deviation' => $row[9],
          //'accepted_qty' => $row[10],
          //'re_opened' => $row[11]
        );

      $purchase_order_line_id = mysqli_real_escape_string($connection, $row[0]);
      $purchase_order_id = mysqli_real_escape_string($connection, $row[1]);
      $po_supplier = mysqli_real_escape_string($connection, $row[2]);
      $sku_code = mysqli_real_escape_string($connection, $row[3]);
      $sku_description = mysqli_real_escape_string($connection, $row[4]);
      $purchase_order_line_state = mysqli_real_escape_string($connection, $row[5]);
      $state_change_time = mysqli_real_escape_string($connection, $row[6]);
      $ordered_qty = mysqli_real_escape_string($connection, $row[7]);
      $received_qty = mysqli_real_escape_string($connection, $row[8]);
      $receiving_deviation = mysqli_real_escape_string($connection, $row[9]);
      $accepted_qty = mysqli_real_escape_string($connection, $row[10]);
      $re_opened = mysqli_real_escape_string($connection, $row[11]);


       //to add rows
       $sql = "INSERT INTO tb_po_line (purchase_order_line_id, purchase_order_id, po_supplier, sku_code, sku_description, purchase_order_line_state, state_change_time, ordered_qty, received_qty, receiving_deviation, accepted_qty, re_opened) VALUES (\"$purchase_order_line_id\",\"$purchase_order_id\",\"$po_supplier\",\"$sku_code\",\"$sku_description\",\"$purchase_order_line_state\",\"$state_change_time\",\"$ordered_qty\",\"$received_qty\",\"$receiving_deviation\",\"$accepted_qty\",\"$re_opened\")";

       $result = mysqli_query($connection, $sql);
ChromePhp::log($sql . ' ' . $result);

     }//while

     echo json_encode($data);
}//if

mysqli_close($connection);
?>
