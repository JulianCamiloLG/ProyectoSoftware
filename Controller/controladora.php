<?php
include_once("../Models/Gastos.php");
include_once("../Models/CuadreCaja.php");
include_once("../Models/GastoTurno.php");
//include_once("../Models/Base.php");

class controladora{
    public function IngresarGasto($valor,$descripcion,$nit,$numerofactura,$nombreempresa){
        $gasto=new Gastos($valor,$descripcion,$nit,$numerofactura,$nombreempresa);
        $gasto->IngresarGasto();
    }
    public function CuadreCaja($sede,$venta){
        $gastosTurno=new GastoTurno();
        $gastos=$gastosTurno->obtenerGastos();
        $venta+=6;
        //$utilidades=$venta-$gastos;
        //$base= new Base();
        //$base->getBase();
        //$base=300000;
        //$ganancia=$utilidades-$base;
        //$cuadre = new CuadreCaja($ganancia,$venta,$gastos,$base);
        //$cuadre->IngresarCuadre();
        //$respuesta=["Ganancia:" => $ganancia, "Venta:" =>$venta, "Gastos:"=>$gastos,"Base:"=>$base];
        //$gastosTurno->reiniciar();
        echo ($venta);

    }
}


$controladora=new controladora();
switch($_REQUEST['funcion']){
    case 1:
        //Ingresar gastos
        $controladora->IngresarGasto($_REQUEST['costo'],$_REQUEST['descripcion'],$_REQUEST['nit'],$_REQUEST['numerofactura'],$_REQUEST['nombreempresa']);
        break;
    case 2:
        //Cuadre de caja
        $controladora->CuadreCaja($_REQUEST['sede'],$_REQUEST['venta']);
        break;
}

?>
