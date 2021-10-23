var servidor = "http://localhost:777";

setArticulo();


function setArticulo(){

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", servidor + '/Articulo/GetArticulo/'+sessionStorage.getItem('idArticulo'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
             var json = JSON.parse(xmlhttp.responseText);
             var template = ``;
             json.map(function(Articulos){
 
                                
                 document.getElementById("item-display").src = Articulos.foto;
                 document.getElementById("lblnombre").innerHTML =  Articulos.Nombre;
                 document.getElementById("lblvalor").innerHTML =  Articulos.Valor;
                 //document.getElementById("clasificacion").innerHTML =  Articulos.Clasificacion;
                 document.getElementById("lbldescripcion").innerHTML =  Articulos.Descripcion;
                 
             });
 
             console.log(template);
   
 
             }
             else {
                 alert("ocurrio un error");
             }
     }
 
    
   }
 
   xmlhttp.send();
 }