<?php
//https://www.taniarascia.com/how-to-use-json-data-with-php-or-javascript/
require_once('../../private/initialize.php');
include ("../../db_connection.php");

  $keywords = utf8_decode($_GET['buscar']);

   $searchSplit = explode(' ', $keywords);

    //armar el query
    $sql = "";
    $sql .= "SELECT detalles FROM user_tabla WHERE ";

    $numWord = count($searchSplit);
    $n = 0;
    foreach ($searchSplit as $searchTerm) {
       $sql .= "detalles LIKE '%".$searchTerm. "%'";
       if(next($searchSplit)==true) {
            $sql .= " OR ";
       }
    }
    $sql .= ";";

    ChromePhp::log($sql);

   $result = mysqli_query($connection, $sql);

 while($row = mysqli_fetch_array($result)) {
   $json = $row[0];
   $json_array = json_decode($json,true);
   ChromePhp::log($json_array);



   foreach ($json_array as $character => $value) {
    //   ChromePhp::log($character);
    //  ChromePhp::log($value);
   }
?>

  <tr>
   <td>
        <!-- <?php echo utf8_encode($json_array["detalles"]); ?>  <br/> -->
        <?php
          foreach ($json_array as $character => $value) {
               echo utf8_encode($character . '-> '. $value) . '<br/>';
          }
        ?>
    </td>
  </tr>


 <?php } ?>
