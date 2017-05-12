
$(function(){
$("#CuadreCaja").on("click",function(argument){
    arreglo=["Ganancia: ","Venta total: ","Gastos totales: ","Base: "];
    var cad="";
    var venta=$("#inputVenta").val();
    if(venta !="" && !isNaN(venta) && venta>0){
        $.post("../Controller/controladora.php", {sede: $("#sede").val(), venta:venta, funcion:2},function(respuesta){
            console.log(respuesta);
            var query=jQuery.parseJSON(respuesta);
			for(var i in query){

                cad+="<Label class=control-label col-xs-3>";
                cad+=i;
                cad+="</Label>";
                cad+="<input class=form-control value=";
                cad+=query[i];
                cad+=" readonly>";
                console.log(cad);
            }
            $("#resultado").html(cad);
    });
    }
    else{
        alert("Compruebe que el campo no este vacio y que sea un numero entero");
    }

});
$("#consultarCaja").on("click",function(argument){
    $.post("../Controller/controladora.php",{funcion:11},function(respuesta){
        //alert(respuesta);
        var datos= jQuery.parseJSON(respuesta);
		for (var i in datos){
            var elementotr=document.createElement('tr');
            // creacion primer td y se lo asigno al padre tr
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto=document.createTextNode(datos[i].numeroarticulo);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            // creacion segundo td y se lo asigno al padre tr
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto=document.createTextNode(datos[i].decision);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto=document.createTextNode(datos[i].titulo);
            elementotd.appendChild(texto);
            elementotd.setAttribute("align","center");
            var elementotd=document.createElement('td');
            elementotr.appendChild(elementotd);
            var elemtoa=document.createElement('a');
            elemtoa.setAttribute('href',"../Models/Leer.php?"+'numeroarticulo='+datos[i].numeroarticulo);
            var createAText = document.createTextNode('Ver Comentarios');
            elemtoa.appendChild(createAText);
            elementotd.appendChild(elemtoa);
            var obj=document.getElementById('Contenido');
            obj.appendChild(elementotr);
        }
    });
});
});
