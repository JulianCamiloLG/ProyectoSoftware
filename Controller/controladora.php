<?php
include_once("../Models/Gastos.php");
include_once("../Models/Login.php");

class controladora{
    public function IngresarGasto($valor,$descripcion,$nit,$numerofactura,$nombreempresa){
        $gasto=new Gastos($valor,$descripcion,$nit,$numerofactura,$nombreempresa);
        $gasto->IngresarGasto();
    }

    public function LoginUsuario($user,$password){
        $login=new Login($user,$password,"");
        $Registros=$login->validarLogin();
        if($Registros=='ADMINISTRADOR'){
            session_start();
			$_SESSION['usuario'] = $Registros;
            echo json_encode(1);
        }elseif($Registros=='MESERO'){
            session_start();
			$_SESSION['usuario'] = $Registros;
            echo json_encode(2);
        }elseif($Registros=='COCINERO'){
            session_start();
			$_SESSION['usuario'] = $Registros;
            echo json_encode(2);
        }elseif($Registros=='JPRODUCCION'){
            session_start();
			$_SESSION['usuario'] = $Registros;
            echo json_encode(3);
        }else{
            echo json_encode(0);
        }
    }
    public function CerrarSesion(){
        session_start();
		session_unset();
		session_destroy();
		echo json_encode(1);
    }
}

$controladora=new controladora();
switch($_REQUEST['funcion']){
    case 1:
        //Ingresar gastos
        $controladora->IngresarGasto($_REQUEST['costo'],$_REQUEST['descripcion'],$_REQUEST['nit'],$_REQUEST['numerofactura'],$_REQUEST['nombreempresa']);
        break;
    case 3:
        //Loggear usuario
        $controladora->LoginUsuario($_REQUEST['user'],$_REQUEST['password']);
        break;
    case 4:
        //Cerrar sesion
        $controladora->CerrarSesion();
        break;

}

?>
