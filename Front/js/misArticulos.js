//addEventListener("load", load)
var servidor = "http://localhost:777";



ListarUsuarios();

function ListarUsuarios(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Articulo/ListarAusuario/'+localStorage.getItem('id'), true);
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
                     <h2>Nombre: ${Articulos.Nombre}</h2>
                     <br>
                     <strong>Descripcion: ${Articulos.Descripcion}</strong>
                     <br>
                     <strong>Valor: ${Articulos.Valor}</strong>
                     <br>
                     <input type="button" onclick="Editar(${Articulos.idArticulo})" value="Editar" class="btn btn-primary" />
                     <br>
                     <input type="button" onclick="borrar(${Articulos.idArticulo})" value="Borrar" class="btn btn-primary" />
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

function $(valor) {
    return document.getElementById(valor);
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



