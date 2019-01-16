
<?php
include ("db_connection.php");
include ("ChromePhp.class.php");
date_default_timezone_set('America/Lima');


$sql = "SELECT insert_date FROM tb_student LIMIT 1";
$result = mysqli_query($connection, $sql);

while($row = mysqli_fetch_array($result)) {

  $last_updt= mb_substr($row[0], 0, 16);
  ChromePhp::log($last_updt);

}

?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <script defer src="js/lib/fontawesome-all.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
  .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
  .dataTables_length{
    display:none;
  }
  body {
      padding-top: 8em;
  }
  </style>



 </head>

 <body>
   <nav class="navbar navbar-default navbar-fixed-top" id="navMenu">
     <div class="container">
        <h3 align="center">Receiving list</h3>

        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <code > receiving list updated on: <?php echo $last_updt; ?></code>
        &nbsp;
     </div>
   </nav>



   <form id="upload_csv" method="post" enctype="multipart/form-data" class="hidden-md">


    <div class="col-md-3">
     <br />
     <label>Update receiving list:</label><br/>
     Entity Query>Inbound> Purchase order line>Query
    </div>
                <div class="col-md-4">
                   <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                </div>
                <div class="col-md-4">
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                </div>
                <div style="clear:both"></div>
   </form>




  <div class="container">

   <br />
   <div class="table-responsivei" id="godown">
    <table class="table table-striped table-bordered" id="data-table">
     <thead>
      <tr>
       <th>Student ID</th>
       <th>Student Name</th>
       <th>Phone Number</th>
     </tr>
     </thead>
   <tbody id="tablebody">
   </tbody>

    </table>
   </div>

  </div>
 </body>
</html>


<!-- Ajax pages for dynamic search options -->
<script src="ajax/tabla.js"></script>

<script>
$(document).ready(function(){
  //search bar input
  $("#myInput").on("keyup", function() {

    var value = $(this).val().toLowerCase();
    $("#tablebody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

  });


});//document ready
</script>


<script>
$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"import.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(jsonData)
   {
    $('#csv_file').val('');
    $('#data-table').DataTable({
     data  :  jsonData,
     columns :  [
      { data : "student_id" },
      { data : "student_name" },
      { data : "student_phone" }
     ]
    });
   }
 });//ajax
});//submit upload_csv Ajax table




});//document ready

</script>
