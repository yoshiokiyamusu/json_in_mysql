<?php
  class csv extends mysqli {

    private $state_csv = false;
    function __construct(){
      //parent::__construct("localhost","cocotfym_user","fiorella123","cocotfym_po");
       parent::__construct("localhost","webuser","yoshio12qw","esky");
       if($this->connect_error){
         echo "fail to connect db:" . $this->connect_error;
       }
    }

    public function cleandata(){
      $q = "DELETE FROM `tb_po_line` WHERE id <> '' ";
      if($this->query($q)){
        echo "removed data";
      }
    }

    public function import($file){
      $first = false;
      $file = fopen($file, 'r');

      while($row = fgetcsv($file)){
          if(!$first){ //no incluir header
              $first = true;
          }else{
            //var_dump($row);
            //print "<pre>"; print_r($row); print "</pre>";
            $value = "'". implode("','",$row). "'";
            $q = "INSERT INTO tb_po_line (purchase_order_line_id,purchase_order_id,po_supplier,sku_code,sku_description,purchase_order_line_state,state_change_time,ordered_qty,received_qty,receiving_deviation,accepted_qty,re_opened ) VALUES(". $value .")";
            if($this->query($q)){
               $this->state_csv = true;
            }else{
              $this->state_csv = false;
              echo $this->error;
            }
          }//else

      }//while

      if($this->state_csv){
      //  echo "successfully imported";
      }else{
        echo "error, data not imported";
      }

    }//end function import





  }//end of class

?>
