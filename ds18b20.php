<?php
/**
 * ds18b20
 */
class DS18B20 {

  public $Ids; // all sensor ids

  function __construct(){
    $this->Ids=file('/sys/devices/w1_bus_master1/w1_master_slaves');
  }

  public function GetData($id=''){
    $id = preg_split("/\n/", $id)[0];
    $patch = "/sys/bus/w1/devices/$id/w1_slave";
    $f = fopen($patch, "r");
    $data = fread($f, filesize($patch));
    preg_match("/t=(.+)/", preg_split("/\n/", $data)[1], $val);
    fclose($f);
    return number_format($val[1] / 1000, 3, '.', '');
  }

}

?>
