var servidor = "http://localhost:777";



GETDomicilio();
function $(valor) {
    return document.getElementById(valor);
}




function GETDomicilio(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/getDomicilio/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Respuesta){


                    template +=`

                  
                    <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >
    
                    <div class="card-body" d-flex flex-column align-items-center justify-content-center>
                    <strong class="card-text font-weight-light" >Calle: ${Respuesta.Direccion}</strong>
                    <br>
                    <strong class="card-text font-weight-light">Ciudad: ${Respuesta.nombreCiuadad} </strong>
                    <br>
                    <strong class="card-text font-weight-light">Provincia: ${Respuesta.nombreProvincia}</strong>
                    <br>
                    <strong class="card-text font-weight-light">Pais : Argentina</strong>
                    <br>
                    </div>
                    </div>
                    `;



                });
                
                console.log(template);
                document.getElementById('lista').innerHTML=template;


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

}


function borrar(id){

  var a = id;
  var xmlhttp = new XMLHttpRequest();
   
  xmlhttp.open("POST", servidor + '/Articulo/Baja', true);
  xmlhttp.onreadystatechange = function () {
      //Veo si llego la respuesta del servidor
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
          //Reviso si la respuesta es correcta
          if (xmlhttp.status == 200) {
              //alert(xmlhttp.responseText);

              ListarUsuarios();
          }
          else {
              alert("ocurrio un error");
          }
      }
  }
  var obje = new FormData();
  obje.append("idArticulo", id);

  //envio el mensaje    
  xmlhttp.send(obje);

}

function Editar(id){

    sessionStorage.setItem('idArticulo', id);
    window.location.href = "/SwapArea/SwapArea/Front/PANTALLAS/Articulos/editar.php";


}
