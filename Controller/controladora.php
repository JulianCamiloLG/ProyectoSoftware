<?php
include_once("../Models/Gastos.php");

class controladora{
    public function IngresarGasto($valor,$descripcion,$nit,$numerofactura,$nombreempresa,$fecha){
        $gasto=new Gastos($valor,$descripcion,$nit,$numerofactura,$nombreempresa,$fecha);
        $gasto->IngresarGasto();
    }
}

$controladora=new controladora();
switch($_REQUEST['funcion']){
    case 1:
        //Ingresar gastos
        $controladora->IngresarGasto($_REQUEST['costo'],$_REQUEST['descripcion'],$_REQUEST['nit'],$_REQUEST['numerofactura'],$_REQUEST['nombreempresa'],$_REQUEST['fecha']);
        break;
}

?>