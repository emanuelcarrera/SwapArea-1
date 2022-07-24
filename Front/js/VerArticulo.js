var servidor = "http://localhost:777";

setArticulo();
ListarComentarios();
GetImagenes();
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
 
                
                 ;
                 document.getElementById("imgfusu").src = Articulos.Usuariofoto;
                 //document.getElementById("item-display").src = Articulos.foto;
                 document.getElementById("lblnombre").innerHTML =  Articulos.Nombre;
                 document.getElementById("lblvalor").innerHTML =  Articulos.Valor;
                 //document.getElementById("clasificacion").innerHTML =  Articulos.Clasificacion;
                 document.getElementById("lbldescripcion").innerHTML =  Articulos.Descripcion;
                 document.getElementById("nombreusu").innerHTML = Articulos.Usuario;
                 
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
                     <div class="col-12 border border-dark rounded">
                     <h10 class="card-text font-weight-light" style="color:blue">${Comentarios.NombreUsuario}</h10>
                     <h20 class="card-text font-weight-light"> ${Comentarios.fecha}  </h20>
                     </br>
                     <a class="card-text font-weight-light"> ${Comentarios.texto} </a>
                   
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

var evento = document.getElementById("btnintercambio")
evento.addEventListener("click", function(){
    Swal.fire({
        title: '¿Esta seguro?',
        input: 'list',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            Ver(sessionStorage.getItem('idArticulo'));
        } 
      })})


function Ver(id){

        sessionStorage.setItem('idArticulo', id);
        window.location.href = "/SwapArea/SwapArea/Front/Pantallas/solicitudes/crearsolicitud.php";
    
    
    }
    
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
      
 



      function GetImagenes(){

        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open("GET", servidor + '/Articulo/GetImagenArticulo/'+sessionStorage.getItem('idArticulo'), true);
        xmlhttp.onreadystatechange = function () {
            //Veo si llego la respuesta del servidor
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                //Reviso si la respuesta es correcta
                
                if (xmlhttp.status == 200) {
                    
                    var json = JSON.parse(xmlhttp.responseText);
                    var cout = 0;
                    var template = ``;
                    if(json.length == 0)
                    {
                                 template +=`<img width="100%" height="100%" src="../imagenes/logo.jpg"  >`;
                                
                            
                    }
                    else if(json.length == 1)
                    {
                        json.map(function(Articulos){
                            template +=`<img width="100%" height="100%" src="${Articulos.urlFoto}"  >`;
                        });
                    }
                    else{
                    template += `<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%; height:100%;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      `;

                    json.map(function(Articulos){
                        if (cout === 0){
                            template +=`<li data-target="#myCarousel" data-slide-to="0" class="active"></li>`;
                            
                        }else{
    
                            template +=`<li data-target="#myCarousel" data-slide-to="${cout}"></li>`;
                        }
                        cout++;
                    });
    
                    template +=`</ol> 
                    <div class="carousel-inner">`;

                    var cout = 0;
                    json.map(function(Articulos){
                         
                         if (cout === 0){
                         template +=`
                         
                           <div class="item active" >
                             <img width="100%" height="100%" src="${Articulos.urlFoto}"  >
                             </div>
                         
                         `;
                         cout = 1;
                         }else
                         {
                            template +=`
                            <div class="item" >
                            <img width="100%" height="100%" src="${Articulos.urlFoto}"  >
                            </div>`;
                         }
    
    
                    });
                    template +=`
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                 `
               }
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
    
     