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
 
                if(localStorage.getItem('id') === Articulos.idUsuario || localStorage.getItem('id') === null){
                 document.getElementById("btnintercambio").hidden = true;
                 document.getElementById("btncomprar").hidden = true;
                }

                sessionStorage.setItem('chatdueño', Articulos.idUsuario);
                
                 
                 if(Articulos.Usuariofoto != null)
                 {
                    document.getElementById("imgfusu").src = Articulos.Usuariofoto;
                 }
                 else{

                    document.getElementById("imgfusu").src ="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                 }
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
                    var fechaformat = new Date(Comentarios.fecha); 

                    if(Comentarios.foto === null)
                    {
                        Comentarios.foto = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";

                    }
                   
                    var fe = [(fechaformat.getDate()).toString().padStart(2, "0"),
                    (parseInt(fechaformat.getMonth().toString().padStart(2, "0")) +1).toString(),
                    fechaformat.getFullYear()].join('-')
                    + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                    fechaformat.getMinutes().toString().padStart(2, "0"),
                    fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 
                     template +=`
                     <div style="font-family: sans-serif;
                     font-size: 18px;
                     font-weight: 400;
                     color: #ffffff;
                     background: rgb(221, 220, 220);
                     margin: 0 0 25px;
                     overflow: hidden;
                     padding: 20px;">
                     <a onclick="resirectChat(${Comentarios.idU})" style="color:blue;"> <img src="${Comentarios.foto}"  width="30" height="30" class="rounded-circle"  >
                     <h10 class="card-text font-weight-light" style="color:blue, size:1;">${Comentarios.NombreUsuario}</h10> </a>
                     <a  style="color:black; font-size: 10px;" > ${fe}  </a>
                     </br>
                     <a class="card-text font-weight-light" style="color:rgb(94, 92, 92);"> ${Comentarios.texto} </a>
                   
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

    if (localStorage.getItem('id') !== null){
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
    document.getElementById("textcomentario").value = "";
    ListarComentarios();
  }else{
    Swal.fire({
        title: 'Debe estar logueado para poder comentar',
      })

  }
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
                            template +=`<img id="myImg" src="${Articulos.urlFoto}"  onclick="imgzoom('${Articulos.urlFoto}')" alt="Snow" style="width:100%;max-width:300px">
                            `;
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
                             <img width="100%" height="100%" onclick="imgzoom('${Articulos.urlFoto}')" src="${Articulos.urlFoto}"  >
                             </div>
                         
                         `;
                         cout = 1;
                         }else
                         {
                            template +=`
                            <div class="item" >
                            <img width="100%" height="100%" onclick="imgzoom('${Articulos.urlFoto}')" src="${Articulos.urlFoto}"  >
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
    


       function resirectChat(id)
       {

        if(id == 0)
        {
          id = sessionStorage.getItem('chatdueño');
        }

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", servidor + '/Chat/getIdChat/'+localStorage.getItem('id')+'/'+id);
        xmlhttp.onreadystatechange = function () {
            //Veo si llego la respuesta del servidor
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                //Reviso si la respuesta es correcta
                
                if (xmlhttp.status == 200) {
                    var json = JSON.parse(xmlhttp.responseText);
                   
                        sessionStorage.setItem('idusuariochat', id);
                        sessionStorage.setItem('idChat', json);
                        
                        window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Chat/Chats.php";
                }
                else {
                   
                }
            }
        }
        xmlhttp.send();

       }


       // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
function imgzoom(url){

  console.log(url);
  modal.style.display = "block";
  modalImg.src = url;

}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
     