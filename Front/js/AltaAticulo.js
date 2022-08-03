
addEventListener("load", load)
var servidor = "http://localhost:777";
//var servidor = "https://backpracticapro.herokuapp.com";
function $(valor) {
    return document.getElementById(valor);
}

let $Categorias = document.getElementById('Categorias');
cargarCategorias();
function load() {
    
    //enviarMensajeAlServidor(servidor , cargarOpcionesProvincia); EnviarUsuario
   $("btnEnviar").addEventListener("click",subir_imagenes);
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
              let template = '<option class="form-control" selected disabled> Seleccione </option>';
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

function subir_imagenes() {
    
    lista_img = new FormData();

   var file= $("archivo").files[0];
    
   var xmlhttp = new XMLHttpRequest();
  
   var fileContent = new FormData();
   var a = 0;
   var files = document.getElementById("archivo").files;

   if( document.getElementById("Categorias").value  === "Seleccione")
   {
    Swal.fire({
      title: 'Categoria obligatoria',
    })
      a = 1;
   }
   if (files.length === 0)  {
        Swal.fire({
        title: 'Foto obligatoria',
      })
        a = 1;
      }    

      if ($("nombre").value === null || $("nombre").value === "") {
        Swal.fire({
        title: 'Nombre Articulo obligatorio',
      })
      a = 1;
      }          

      if ($("valor").value === null ||$("valor").value === "") {
        Swal.fire({
        title: 'Valor del articulo obligatorio',
      })
      a = 1;
      }          

      if ($("descripcion").value === null || $("descripcion").value  === "") {
        Swal.fire({
        title: 'Descripcion obligatoria',
      })
      a = 1;
      }          


   if (a === 0)
   {
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
       fileContent.append("Clasificacion",document.getElementById("Categorias").value );
       fileContent.append("Descripcion", $("descripcion").value);


       xmlhttp.send(fileContent);

     }
     var a =fileReader.readAsDataURL(fileToLoad);
     
     
     Swal.fire({
      title: 'Se creo correctamente',
      confirmButtonText: 'OK',
      confirmButtonColor: '#28a745',
    }).then((result) => {

      if (result.isConfirmed) {
         
          window.location.href = "../Articulos/misArticulos.php";

      } 
    })
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


  }


  function getBase64(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = error => reject(error);
    });
  }
  
