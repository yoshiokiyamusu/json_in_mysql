<?php
include ("db_connection.php");
include ("ChromePhp.class.php");
date_default_timezone_set('America/Lima');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script defer src="js/lib/fontawesome-all.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <title>esky</title>
</head>

<div id="webcoderskull">
<body class="site-body">

  <header id="page-hero" class="site-header">

    <nav class="site-nav family-sans text-uppercase navbar navbar-expand-md">

      <div class="container-fluid">

        <a class="navbar-brand" href="#page-hero">
          <i class="fas fa-cube"></i> Cocotfyma_index </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myTogglerNav" aria-controls="#myTogglerNav"
          aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <section class="collapse navbar-collapse" id="myTogglerNav">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="#page-hero">home</a>
            <a class="nav-item nav-link" href="index.php">SKU</a>
            <a class="nav-item nav-link" href="#page-media">Ordenes</a>
            <a class="nav-item nav-link" href="#page-photogrid">Almacen</a>
            <a class="nav-item nav-link" href="#page-carousel">Ventas</a>
            <a class="nav-item nav-link" href="#page-nested">Proveedores</a>
            <a class="nav-item nav-link" href="#page-icons">Logistica</a>
            <a class="nav-item nav-link" href="#page-floater">Clientes</a>
          </div>
        </section>

      </div>

    </nav>

    <section class=" d-flex align-items-center text-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-11 col-sm-10 col-md-8">
            <h2 class="page-section-title openSans"> <i class="fas fa-truck"></i> Cocotfyma_index</h2>
            <h6 class="page-section-text openSans"> indexemos la información para generar inteligencia </h6>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!-- body! -->



    <article id="page-multicolumn" class="page-section text-center  herramientas">
      <h3 align="center">Receiving list <code> 26/12/2018</code></h3>

      <form id="upload_csv" method="post" enctype="multipart/form-data" class="hidden-md">
         <div class="col-md-3">
          <br />
          <label>Add More Data</label>
         </div>

         <div class="col-md-4">
            <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
         </div>
         <div class="col-md-5">
             <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
         </div>
         <div style="clear:both"></div>
      </form>



      <div class="table-responsive">
       <table class="table table-striped table-bordered" id="data-table">
        <thead>
         <tr>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Phone Number</th>
         </tr>
        </thead>


       </table>
      </div>

    </article>
  </div><!-- webcoderskull -->




  <script src="js/lib/jquery.min.js"></script>
  <script src="js/lib/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>



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
