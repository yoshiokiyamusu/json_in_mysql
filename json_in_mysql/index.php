<?php
require_once('private/initialize.php');
include ("db_connection.php");
date_default_timezone_set('Australia/Sydney');

 include('public/front_end/header.php');
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pull json data from MySQL</title>
  </head>
  <body>
    <h1>Pull json data from MySQL</h1>
    <div class="container-fluid">

    <form id="buscar_input" action="<?php echo ('index.php'); ?>" method="post">
      <div id="phone-list">
        <div class="form-group row">
          <label for="inputtext3" class="col-sm-4 col-form-label">search sku</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputsearch" name="numero_1" placeholder="" >
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary cla_busca_boton"> search </button>
          </div>
        </div>
      </div><!-- id="phone-list" -->
    </form>


   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered" id="data-table">
     <thead>
      <tr>
        <th>Sku info</th>
     </tr>
     </thead>
     <tbody id="tablebody"></tbody>
    </table>
   </div>

   </div>

  </body>
</html>


<!-- Ajax pages for dynamic search options -->
<!--<script src="public/ajax/po_tabla.js"></script> para hacer foreach en cada uno de las parametros jason deltro de cada celda-->
<script src="public/ajax/search.js"></script>
