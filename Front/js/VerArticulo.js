var servidor = "http://localhost:777";

setArticulo();
ListarComentarios();

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

 function ListarComentarios(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Comentarios/getComentariosByArticulo/'+sessionStorage.getItem('idArticulo'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Comentarios){

                     template +=`
                     <div class="col-sm-9">
                     <hr>
                     <h10 style="color:blue">${Comentarios.NombreUsuario}</h10>
                     <h20> ${Comentarios.fecha}  </h20>
                     </br>
                     <a> ${Comentarios.texto} </a>

                     </div>
                     `;

                });
                console.log(template);
                document.getElementById('comentarios').innerHTML=template;


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

}


function comentar(){

    sessionStorage.getItem('idArticulo');
    localStorage.getItem('id');

    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Comentarios/Comentar', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    fileContent.append("idUsuario", localStorage.getItem('id'));
    fileContent.append("idArticulo", sessionStorage.getItem('idArticulo')); 
    fileContent.append("Texto", document.getElementById("textcomentario").value);

    xmlhttp.send(fileContent);
    ListarComentarios();
}

function CompraArticulo(){


    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Solicitudes/CompraArticulo', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    fileContent.append("ofertante", localStorage.getItem('id'));
    fileContent.append("id_Artuculo", sessionStorage.getItem('idArticulo')); 
    fileContent.append("monto", document.getElementById("lblvalor").innerText);

    xmlhttp.send(fileContent);
    Swal.fire({
        title: 'Se envio una solicitud de compra al vendedor',
      })
    
}

//var evento = document.getElementById("btnintercambio")
//evento.addEventListener("click", function(){
//    Swal.fire({
//        title: '¿Esta seguro?',
//        input: 'list',
//        showDenyButton: true,
//        showCancelButton: false,
//        confirmButtonText: 'Si',
//        denyButtonText: `No`,
//        confirmButtonColor: '#28a745',
//      }).then((result) => {

//        if (result.isConfirmed) {
           
          

//        } 
//      })})


var evento = document.getElementById("btncomprar")
evento.addEventListener("click", function(){
    Swal.fire({
        title: '¿Esta seguro?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            CompraArticulo();

        } 
      })})



      const open = document.getElementById('btnintercambio');
      const modal_container = document.getElementById('modal_container');
      const close = document.getElementById('close');
      
      open.addEventListener('click', () => {
        modal_container.classList.add('show');  
      });
      
      close.addEventListener('click', () => {
        modal_container.classList.remove('show');
      });