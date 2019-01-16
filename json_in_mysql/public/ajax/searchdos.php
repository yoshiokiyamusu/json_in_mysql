<?php
//https://www.taniarascia.com/how-to-use-json-data-with-php-or-javascript/
require_once('../../private/initialize.php');
include ("../../db_connection.php");

   $keywords = utf8_decode($_GET['buscar']);
   $searchSplit = explode(' ', $keywords);
   $colnames = array("nombre", "posicion", "ano_inicio", "detalles");
   $i = 0;//contar las vueltas
    //armar el query
    $sql = "SELECT *,SUM(rep) as numrep FROM (";

    foreach ($colnames as $colname) {
      $sql .= "SELECT *, COUNT(*) as 'rep' FROM user_tabla WHERE";


      foreach ($searchSplit as $searchTerm) {
        $sql .= " ".$colnames[$i]." LIKE '%".$searchTerm."%'";
        if(next($searchSplit)==true) {
          $sql .= " OR";
        }
      }//search words

      $sql .= " group by id";
      if(next($colnames)==true){
        $sql .= " UNION ALL ";
      }
    $i++;
    }//colname

    $sql .= ") as tb ";
    $sql .= "GROUP BY id ORDER BY numrep DESC";

    ChromePhp::log($sql);

   $result = mysqli_query($connection, $sql);

 while($row = mysqli_fetch_array($result)) {

?>

  <tr>
   <td>
       <?php echo utf8_encode($row[0]); ?>  <br/>
       <?php echo utf8_encode($row[1]); ?>  <br/>
       <?php echo utf8_encode($row[2]); ?>  <br/>
       <?php echo utf8_encode($row[3]); ?>  <br/>

    </td>
  </tr>

  <!--
  //armar el query
  $sql = "";
  $sql .= "SELECT * FROM user_tabla WHERE";
  $colnames = array("nombre", "posicion", "ano_inicio", "detalles");
  $i = 0;//numero de loops
  foreach ($colnames as $colname) {
    foreach ($searchSplit as $searchTerm) {
       $sql .= " ".$colname." LIKE '%".$searchTerm."%'";
       if(next($searchSplit)==true) {
            $sql .= " OR";
       }
    }//search words
    if(next($colnames)==true && $i < count($colnames)-1) {
         $i++;
         $sql .= " OR";
    }
  }//colnames
  $sql .= ";";
-->
<?php } //while($row = mysqli_fetch_array($result)) ?>
