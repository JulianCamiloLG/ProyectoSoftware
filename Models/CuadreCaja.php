<?php
include_once("BaseDeDatos.php");
class CuadreCaja{
    var $ganancia;
    var $ventaTotal;
    var $gastosTurno;
    var $base;

    public function __construct($ganancia,$ventaTotal,$gastosTurno,$base){
        $this->ganancia=$ganancia;
        $this->ventaTotal=$ventaTotal;
        $this->gastosTurno=$gastosTurno;
        $this->base=$base;
    }
    //Ingresar cuadre de caja a la base de datos
    public function IngresarCuadre(){
        $BDD=new BaseDeDatos();
        $temp=$BDD->ConectarBDD();
        $Sql="insert into cuadrecaja values($this->ganancia,$this->ventaTotal,$this->gastosTurno,$this->base ,current_date);";
        $result=pg_exec($Sql);
        if (!$result){
            echo ("Error al ingresar el cuadrecaja");
        }
        //echo json_encode("Gasto ingresado con exito");
    }
}
?>
