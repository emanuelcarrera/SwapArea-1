var servidor = "http://localhost:777";
addEventListener("load", load)
cargarCategorias();
setArticulo();
let $Categorias = document.getElementById('Categorias');

function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   $("btnEnviar").addEventListener("click",Modificar);
   //$("btnEnviarUsuario").addEventListener("click",AltaUsuario);

    
}

function cargarCategorias() {

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Articulo/GetCategorias', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                let template = '<option class="form-control" selected disabled>-- Seleccione --</option>';
                json.forEach(respuesta => {
                    template += `<option class="form-control" value="${respuesta.idCategoria}">${respuesta.Descripcion}</option>`;
                })
                $Categorias.innerHTML = template;
  
                //GETDomicilio();
            }
            else {
                alert("ocurrio un error");
            }
        }
    }
  
    xmlhttp.send();
  
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
 fileContent.append("Clasificacion", document.getElementById("Categorias").value);
 fileContent.append("Descripcion", document.getElementById("descripcion").value);


 xmlhttp.send(fileContent);
 Swal.fire({
    title: 'Se modifico correctament',
    confirmButtonText: 'OK',
    confirmButtonColor: '#28a745',
  }).then((result) => {

    if (result.isConfirmed) {
       
        window.location.href = "../Articulos/misArticulos.php";

    } 
  })



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

                <img src=${Articulos.foto}  width="200" height="100">   
                `;
                Articulos.foto
                document.getElementById("nombre").value =  Articulos.Nombre;
                document.getElementById("valor").value =  Articulos.Valor;
                document.getElementById("Categorias").value =  Articulos.idCategoria;
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