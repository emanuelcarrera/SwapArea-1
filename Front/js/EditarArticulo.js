var servidor = "http://localhost:777";
addEventListener("load", load)
setArticulo();

function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   $("btnEnviar").addEventListener("click",Modificar);
   //$("btnEnviarUsuario").addEventListener("click",AltaUsuario);

    
}


function Modificar(){

    var xmlhttp = new XMLHttpRequest();
  
    var fileContent = new FormData();


xmlhttp.open("POST", servidor + '/Articulo/Modificacion', true);
xmlhttp.onreadystatechange = function () {
    //Veo si llego la respuesta del servidor
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        //Reviso si la respuesta es correcta
        if (xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);

            
        }
        else {
            alert("ocurrio un error");
        }
    }
 }
 fileContent.append("idArticulo", sessionStorage.getItem('idArticulo'));          
 fileContent.append("Nombre", document.getElementById("nombre").value );
 fileContent.append("Valor", document.getElementById("valor").value);
 fileContent.append("Clasificacion", document.getElementById("clasificacion").value);
 fileContent.append("Descripcion", document.getElementById("descripcion").value);


 xmlhttp.send(fileContent);

 alert("Se modifico correctamente");


}



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

                template +=`
                <div class="col-sm-3">

                <img src=${Articulos.foto} >   
                `;
                Articulos.foto
                document.getElementById("nombre").value =  Articulos.Nombre;
                document.getElementById("valor").value =  Articulos.Valor;
                document.getElementById("clasificacion").value =  Articulos.Clasificacion;
                document.getElementById("descripcion").value =  Articulos.Descripcion;
                
            });

            console.log(template);
            document.getElementById('fotos').innerHTML=template;

            }
            else {
                alert("ocurrio un error");
            }
    }

   
  }

  xmlhttp.send();
}