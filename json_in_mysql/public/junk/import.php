<?php
include ("ChromePhp.class.php");
include ("db_connection.php");

//to clear down records
$sql_uno = "DELETE FROM tb_student WHERE student_id <> ''";
$result = mysqli_query($connection, $sql_uno);

if(!empty($_FILES['csv_file']['name'])){

   $file_data = fopen($_FILES['csv_file']['name'], 'r');
   fgetcsv($file_data);
     while($row = fgetcsv($file_data)) {
       $row[3] = $row[1] . ' ' .$row[2];
//ChromePhp::log($row[3]);
        $data[] = array(
         'student_id'  => $row[0],
         'student_name'  => $row[3],
         'student_phone'  => $row[2]

        );

      //$stu_id = $row[0];
      $stu_id = mysqli_real_escape_string($connection, $row[0]);
      $student_name = mysqli_real_escape_string($connection, $row[1]);
      $student_phone = mysqli_real_escape_string($connection, $row[2]);

    //to add rows
    $sql = "INSERT INTO tb_student (student_id, student_name, student_phone) VALUES
    ($stu_id,\"$student_name\",\"$student_phone\")";
    $result = mysqli_query($connection, $sql);
ChromePhp::log($sql . ' ' . $result);

     }//while
//ChromePhp::log($data);
     echo json_encode($data);
}

mysqli_close($connection);
?>
