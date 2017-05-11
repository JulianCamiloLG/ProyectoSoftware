//Ingresar gastos
$("#IngresarGastos").button().on("click",function(event){
    alert("Entro");
    costo=$("#inputCosto").val();
    descripcion=$("#inputDescripcion").val();
    nit=$("#inputNit").val();
    numerofactura=$("#inputNumeroFactura").val();
    nombreempresa=$("#inputNombreEmpresa").val();
    fecha=$("#inputFecha").val();
    if(costo!="" && !isNaN(costo) && costo>=0){
        if(nit !="" && !isNaN(nit) && nit>0 && numerofactura != "" && !isNaN(numerofactura) && numerofactura>0){
            $.post("../Controller/controladora.php",{costo:costo,descripcion:descripcion,nit:nit,numerofactura:numerofactura,nombreempresa:nombreempresa,fecha:fecha,funcion:1},function(respuesta){
                alert(respuesta);
            })
            
        }else{
            alert("NIT o Numero de factura invalido o vacio, valor de tipo numerico");
        }
                
    }else{
        alert("El campo costo no cumple con los requisitos (numerico y mayor o igual a cero)");
    }
    
})