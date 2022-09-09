var servidor = "http://localhost:777";
cargarDropdown();
setArticulo();
GetImageneotro();
let $misArticulos = document.getElementById('misArticulos');

function cargarDropdown() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", servidor + '/Articulo/ListarAusuario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                let template = '<option class="form-control" selected disabled>-- Seleccione --</option>';
                json.forEach(respuesta => {
                    template += `<option class="form-control" value="${respuesta.idArticulo}">${respuesta.Nombre}</option>`;
                })
                $misArticulos.innerHTML=template;
            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();
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


var evento = document.getElementById("btnAceptar")
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
           
            EnviarSolicitud();

        } 
      })})


      function   EnviarSolicitud()
      {
       if(document.getElementById("misArticulos").value != "-- Seleccione --"){
        var xmlhttp = new XMLHttpRequest();
        var fileContent = new FormData();
        xmlhttp.open("POST", servidor + '/Solicitudes/AltaSolicitud', true);
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
    
        fileContent.append("idoferta", document.getElementById("misArticulos").value);
        fileContent.append("idArticulo", sessionStorage.getItem('idArticulo')); 
        fileContent.append("monto", document.getElementById('txtmonto').value);
        fileContent.append("comentario", document.getElementById('txtcomentario').value);
        fileContent.append("idUsuario", localStorage.getItem('id'));
    
        xmlhttp.send(fileContent);
        Swal.fire({
            title: 'Se envio una solicitud al vendedor',
          })
        }else{

            Swal.fire({
                title: 'Seleccione un articulo',
              })
        }

      }

      var event = document.getElementById("misArticulos")
      event.addEventListener("change", function(){
        GetImagenes();

      })
      function GetImageneotro(){
        
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
 
                    json.map(function(Articulos){
                        if (cout === 0){
                            template += Articulos.urlFoto;
                            
                        }
                        cout++
                    });
                   
    

               }
                    console.log(template);
                    document.getElementById('item-display').src=template;
    
    
                }

            }
    
        xmlhttp.send();
       }
    
      function GetImagenes(){
        
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open("GET", servidor + '/Articulo/GetImagenArticulo/'+document.getElementById('misArticulos').value.toString(), true);
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
 
                    json.map(function(Articulos){
                        if (cout === 0){
                            template += Articulos.urlFoto;
                            
                        }
                        cout++
                    });
                   
    

               }
                    console.log(template);
                    document.getElementById('item-display2').src=template;
    
    
                }

            }
    
        xmlhttp.send();
       }
    
     