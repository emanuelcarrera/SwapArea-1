
addEventListener("load", load)
//var servidor = "http://localhost:777";
var servidor = "https://backpracticapro.herokuapp.com";
function $(valor) {
    return document.getElementById(valor);
}


function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   $("btnEnviar").addEventListener("click",subir_imagenes);
   //$("btnEnviarUsuario").addEventListener("click",AltaUsuario);

    
}

function subir_imagenes() {
    
    lista_img = new FormData();

   var file= $("archivo").files[0];
    
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
       
       fileContent.append("idUsuario", localStorage.getItem('id'));          
       fileContent.append("Nombre", $("nombre").value);
       fileContent.append("Valor", $("valor").value);
       fileContent.append("Clasificacion", $("clasificacion").value);
       fileContent.append("Descripcion", $("descripcion").value);


       xmlhttp.send(fileContent);

     }
     var a =fileReader.readAsDataURL(fileToLoad);
     
           alert("Se creo correctamente");
   }
   //var blobURL = window.createBlobURL(fileObj);
   
   xmlhttp.open("POST", servidor + '/Articulo/Alta', true);
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

  



  }


  function getBase64(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = error => reject(error);
    });
  }
  
