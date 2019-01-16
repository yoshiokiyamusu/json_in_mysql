<?php require_once('private/initialize.php'); ?>
<?php include('public/front_end/header.php'); ?>

<?php
if(is_post_request()) {

  // Create record using post parameters

	  //$args = $_POST['admin'];
	  $args = [];
    $args['nombre'] = $_POST['nombre'] ?? NULL;
	  $args['posicion'] = $_POST['posicion'] ?? NULL;
	  $args['ano_inicio'] = $_POST['ano_inicio'] ?? NULL;

    //armar la variable json
      $post_count = count($_POST);
      $post_count = $post_count - 2;
      $concat = "{\"phone\":" . $_POST['numero_1'] . "";

      for($i = 2; $i < ($post_count); $i++ ){
        $inputbox = "numero_" . $i . "";
        $concat .= ",\"phone\":" . $_POST["$inputbox"] . "";
      }
      $concat .= "}";

	  $args['detalles'] = $concat ?? NULL;

	  $user = new User ($args);
    //ChromePhp::log( print_r($user));

	  $result = $user->save();


  if($result === true) {
      //$session->message('The user was created successfully.');
      //redirect_to(url_for('principal.php'));

  } else {
    // show errors
  }

} else {
  // display the form
  $user = new user;
}

?>

<section class="container">

<form id="add-usuario" action="<?php echo ('add_user.php'); ?>" method="post">
  <div class="row">
    <div class="col p-2 justify-content family-sans">
      <section>

        <div class="form-group row">
          <label for="inputtext" class="col-sm-4 col-form-label">Nombre:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputtext" name="nombre" placeholder="" >
          </div>
        </div>

        <div class="form-group row">
          <label for="inputtext1" class="col-sm-4 col-form-label">Posicion:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputtext1" name="posicion" placeholder="" >
          </div>
        </div>

        <div class="form-group row">
          <label for="inputtext2" class="col-sm-4 col-form-label">año de inicio:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="inputtext2" name="ano_inicio" placeholder="" >
          </div>
        </div>

        <div id="phone-list">
          <div class="form-group row">
            <label for="inputtext3" class="col-sm-4 col-form-label">Phone numbers</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputtext3" name="numero_1" placeholder="" >
            </div>
            <div class="col-sm-3">
              <button class="btn btn-primary add_phone_button"> Extra </button>
            </div>
          </div>
        </div><!-- id="phone-list" -->

      </section>
    </div>
  <!-- SEGUNDA PARTE!----------------------------------------------------------------------------------------------->
    <div class="col p-2 justify-content family-sans">
      <section class="jumbotron">
        &nbsp;
        &nbsp;
        <h1><h1>
        &nbsp;
        &nbsp;
        <h1><h1>
        &nbsp;
        &nbsp;
        <h1><h1>
        &nbsp;
        &nbsp;
        <h1><h1>
        &nbsp;
        &nbsp;
        <h1><h1>
        &nbsp;

      </section>
    </div>

  </div><!-- d-flex -->


  <div class="row">
    <div class="col-sm bg-success">
        <button type="submit" class="btn btn-secondary btn-sm guardar" >Guardar</button>
    </div>
  </div>

</form>
<script src="public/js/script.js"></script>

&nbsp;
&nbsp;
<?php include('public/front_end/footer.php'); ?>
