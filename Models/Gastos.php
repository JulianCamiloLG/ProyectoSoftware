<?php
include_once("BaseDeDatos.php");
class Gastos{
    var $valor;
    var $descripcion;
    var $nit;
    var $numerofactura;
    var $nombreempresa;
    var $fecha;
    var $BDD;
    
    public function __construct($valor,$descripcion,$nit,$numerofactura,$nombreempresa,$fecha){
        $this->valor=$valor;
        $this->descripcion=$descripcion;
        $this->nit=$nit;
        $this->numerofactura=$numerofactura;
        $this->nombreempresa=$nombreempresa;
        $this->fecha=$fecha;
    }
    //Ingresar gasto a la base de datos
    public function IngresarGasto(){
        $BDD=new BaseDeDatos();
        $temp=$BDD->ConectarBDD();
        $Sql="insert into gastos values($this->valor,'$this->descripcion',$this->nit,$this->numerofactura,'$this->nombreempresa,'$this->fecha');";
        pg_exec($Sql);
        echo json_encode($temp);
    }
}
?>