
$(function(){
$("#CuadreCaja").on("click",function(argument){
    arreglo=["Ganancia:","Venta total:","Gastos totales:","Base:"];
    var cad="";
    var venta=$("#inputVenta").val();
    if(venta !="" && !isNaN(venta) && venta>0){
        $.post("../Controller/controladora.php", {sede: $("#sede").val(), venta:venta, funcion:2},function(respuesta){
            console.log(respuesta);
            var query=jQuery.parseJSON(respuesta);
            console.log(query[0]);
			for(var i in query[0]){
                cad+="<Label>";
                cad+=arreglo[i];
                cad+="</Label><input class=form-group value=";
                cad+=key;
                cad+=" readonly>";

            }
            $("#resultado").html(cad);
    });
    }
    else{
        alert("Compruebe que el campo no este vacio y que sea un numero entero");
    }

});
});
