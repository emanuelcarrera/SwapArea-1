var servidor = "http://localhost:777";
let $departamento = document.getElementById('departamento');
let $provincia = document.getElementById('provincia');
//let $distrito = document.getElementById('distrito');
addEventListener("load", load);
function $(valor) {
    return document.getElementById(valor);
}

function load() {   

   $("btnEnviar").addEventListener("click",Modificar);
   $("btnSubirFoto").addEventListener("click",subir_imagenes);
   $("btnpass").addEventListener("click",cambio_pass);
   $("guardarDomiciclio").addEventListener("click",AltaDomicilio);
   
   GETUsuarios();
   cargarProvincias();
}

function cargarProvincias() {

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/GetProvinvias', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                let template = '<option class="form-control" selected disabled>-- Seleccione --</option>';
                json.forEach(respuesta => {
                    template += `<option class="form-control" value="${respuesta.id}">${respuesta.nombre}</option>`;
                })
                $provincia.innerHTML = template;

                //GETDomicilio();
            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

}

function GETUsuarios(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/GetDatosUsuario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Usuario){

                    document.getElementById("first_name").value =  Usuario.Nombre;
                    document.getElementById("last_name").value =  Usuario.Apellido;
                    document.getElementById("lblUser").innerHTML  =  Usuario.NombreUsuario;
                    document.getElementById("mobile").value =  Usuario.Telefono;
                    document.getElementById("email").value =  Usuario.Mail;
                    document.getElementById("edad").value =  Usuario.Edad;
                    if (Usuario.foto != null)
                    {
                        document.getElementById("foto").src =Usuario.foto;
                        
                    }

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



function Modificar(){
    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Usuarios/Modificacion', true);
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

    fileContent.append("IdUsuario", localStorage.getItem('id'));          
    fileContent.append("Nombre", document.getElementById("first_name").value );
    fileContent.append("Apellido", document.getElementById("last_name").value);
    fileContent.append("email", document.getElementById("email").value);
    fileContent.append("edad", document.getElementById("edad").value);
    fileContent.append("telefono", document.getElementById("mobile").value);
   
    xmlhttp.send(fileContent);

    Swal.fire({
        title: 'Se modifico correctamente',
      })

}

function cambio_pass(){

    var pass = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;
    if(document.getElementById("password").value == document.getElementById("password2").value){
    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    var uri = ( servidor + '/Usuarios/ValidadPass/'+document.getElementById("lblUser").innerHTML+'/'+document.getElementById("passwordold").value +'/'+document.getElementById("password").value +'/'+localStorage.getItem('id') );
    xmlhttp.open("GET", servidor + '/Usuarios/ValidadPass/'+document.getElementById("lblUser").innerHTML+'/'+document.getElementById("passwordold").value +'/'+document.getElementById("password").value +'/'+localStorage.getItem('id') , true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                if(json.Contraseña != null)
                {
                    Swal.fire({
                        title: 'Se modifico correctamente',
                      })
                }
                else
                {

                    Swal.fire({
                        title: 'La contraseñas actual no coinciden',
                      })
                }

            } else {
                alert("ocurrio un error");
            }
        }
    }
    xmlhttp.send();
   
  }else{

    Swal.fire({
        title: 'La contraseñas no coinciden',
      })
  }

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

       xmlhttp.send(fileContent);
       GETUsuarios();

     }
     var a =fileReader.readAsDataURL(fileToLoad);
     
   }
   //var blobURL = window.createBlobURL(fileObj);
   
   xmlhttp.open("POST", servidor + '/Usuarios/GuardarFoto', true);
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


  function cargarDistritos(sendDatos) {
    var xmlhttp = new XMLHttpRequest();
    var url = servidor + '/Usuarios/Getciudades/'+sendDatos.toString();
    xmlhttp.open("GET", servidor + '/Usuarios/Getciudades/'+sendDatos.toString(), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                let template = '<option class="form-control" selected disabled>-- Seleccione --</option>';
                json.forEach(respuesta => {
                    template += `<option class="form-control" value="${respuesta.id}">${respuesta.nombre}</option>`;
                })
                $departamento.innerHTML = template;
            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();
}

  $provincia.addEventListener('change', () => {

    const sendDatos = $provincia.value

    
    cargarDistritos(sendDatos);
});

function AltaDomicilio(){
    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Usuarios/AltaDomicilio', true);
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

    fileContent.append("IdUsuario", localStorage.getItem('id'));
    fileContent.append("Direccion", document.getElementById("dimicilio").value);
    fileContent.append("id_ciudad", $departamento.value);
   
    xmlhttp.send(fileContent);

    Swal.fire({
        title: 'Se modifico correctamente',
      })

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

                    document.getElementById("Direccion").value =  Respuesta.Direccion;
                    cargarDistritos(Respuesta.id_ciudad);
                    document.getElementById('departamento').getElementsByTagName('option')[Respuesta.id_ciudad].selected = 'selected';
                    document.getElementById('provincia').getElementsByTagName('option')[Respuesta.id_Provincia].selected = 'selected';

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




