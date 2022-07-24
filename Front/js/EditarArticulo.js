var servidor = "http://localhost:777";
addEventListener("load", load)
cargarCategorias();
setArticulo();
GetImagenes();
let $Categorias = document.getElementById('Categorias');

function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   //$("btnEnviar").addEventListener("click",Modificar);
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


function subir_imagenes() {
    
    lista_img = new FormData();

   //var file= $("archivo").files[0];
    
   var xmlhttp = new XMLHttpRequest();
  
   var fileContent = new FormData();
 
   var filesSelected = document.getElementById("archivo").files;
   if (filesSelected.length > 0) {
     var fileToLoad = filesSelected[0];
     var fileReader = new FileReader();
     fileReader.onload = function(fileLoadedEvent) {
       var srcData = fileLoadedEvent.target.result; // <--- data: base64
       var newImage = document.createElement('img');
       newImage.src = srcData;
       //var cssBG =  
       fileContent.append("archivo", "url('"+srcData+"')");
       
       fileContent.append("idArticulo", sessionStorage.getItem('idArticulo'));  

       xmlhttp.send(fileContent);
      

     }
     var a =fileReader.readAsDataURL(fileToLoad);
     
   }
   //var blobURL = window.createBlobURL(fileObj);
   
   xmlhttp.open("POST", servidor + '/Articulo/SubirImagenArticulo', true);
   xmlhttp.onreadystatechange = function () {
       //Veo si llego la respuesta del servidor
       if (xmlhttp.readyState == XMLHttpRequest.DONE) {
           //Reviso si la respuesta es correcta
           if (xmlhttp.status == 200) {
               //alert(xmlhttp.responseText);

               GetImagenes();
           }
           else {
               alert("ocurrio un error");
           }
       }
    }

   

  }


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

 