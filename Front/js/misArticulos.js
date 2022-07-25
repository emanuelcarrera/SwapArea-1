//addEventListener("load", load)
var servidor = "http://localhost:777";
//var servidor = "https://backpracticapro.herokuapp.com/";



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
                     <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >

                     <img class="card-img-top"  width="200" height="200" src=${Articulos.foto} >
                     <div class="card-body d-flex flex-column align-items-center justify-content-center">
                     <h2 class="card-title" >${Articulos.Nombre}</h2>
                     <br>
                     <strong class="card-text font-weight-light">Descripción: ${Articulos.Descripcion}</strong>
                     <br>
                     <strong class="card-text font-weight-light">Categoría: ${Articulos.Clasificacion}</strong>
                     <br>
                     <strong class="card-text font-weight-light">Valor: ${Articulos.Valor}</strong>
                     <br>
                     <input type="button" onclick="Editar(${Articulos.idArticulo})" value="Editar" class="btn btn-primary" />
                     <br>
                     <br>
                     <input type="button" onclick="AceptarBorrar(${Articulos.idArticulo})" value="Borrar" class="btn btn-danger" />
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

function $(valor) {
    return document.getElementById(valor);
}

function AceptarBorrar(id){
    Swal.fire({
        title: '¿Esta seguro?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            borrar(id);

        } 
      })}



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

function  Nuevo(){
   // /SwapArea/SwapArea/Front/PANTALLAS/Articulos/misArticulos.php
    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Articulos/altaArticulos.php";


}

function Editar(id){

    sessionStorage.setItem('idArticulo', id);
    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Articulos/editar.php";


}



