<?php

class user extends BDobject {

static protected $table_name = 'user_tabla';
static protected $db_columns = ['id', 'nombre','posicion','ano_inicio','detalles'];

//INSERT-PUSH
public function __construct($args=[]) {
  $this->nombre = $args['nombre'] ?? '';
  $this->posicion = $args['posicion'] ?? '';
  $this->ano_inicio = $args['ano_inicio'] ?? '';
  $this->detalles = $args['detalles'] ?? '';

}

protected function validate(){
  $this->errors = [];
  if(is_blank($this->nombre)){
    $this->errors[] = "completar nombre";
  }
  return $this->errors;
}

  //MYSQL-Columnas de la tabla
  public $id;
  public $nombre;
  public $posicion;
  public $ano_inicio;
  public $detalles;

  public $inserted_id;
}//END CLASS

?>
