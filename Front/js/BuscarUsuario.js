var servidor = "http://localhost:777";

ListarUsusario();
getUsuarioChat();
function ListarUsusario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/Listar/'+localStorage.getItem('id').toString(), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(usuarios){
                    if(usuarios.idUsuario !=  localStorage.getItem('id')){  
                    if (usuarios.foto == null)
                    { usuarios.foto  = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";  }
                     template +=
                     `
                     <li class="clearfix" onclick="Chatear(${usuarios.idUsuario})">
                     <img src="${usuarios.foto}" alt="avatar" width="45" height="45">
                     <div class="about">
                         <div class="name">${usuarios.NombreUsuario}</div>
                         <div class="status" `;if(usuarios.visto > 0){ template += ` style="color:red;" `}; template +=`> Mensajes sin leer : ${usuarios.visto}</div>                                            
                     </div>
                    </li>

                     `;
                    }
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
function getUsuarioChat(){


    if(sessionStorage.getItem('idusuariochat') !== null){
    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/GetDatosUsuario/'+ sessionStorage.getItem('idusuariochat'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(usuario){
                    document.getElementById('txtnombre').innerHTML= usuario.NombreUsuario;
                    if (usuario.foto != null)
                    {
                    document.getElementById('imgfoto').src = usuario.foto;
                    }
                    else
                    {
                        document.getElementById('imgfoto').src = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                    }
                    document.getElementById('divchat2').style.visibility='visible'
                    document.getElementById('divchat').style.visibility='visible' 
                });
                
            }
            else {
                alert("ocurrio un error");
            }
        }
        
    }

    xmlhttp.send();
   }else
   {
    document.getElementById('divchat2').style.visibility='hidden' 

    document.getElementById('divchat').style.visibility='hidden' 
    
   }

}


function Chatear(idotrousuario)
{

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", servidor + '/Chat/getIdChat/'+localStorage.getItem('id')+'/'+idotrousuario);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
               
                    sessionStorage.setItem('idusuariochat', idotrousuario);
                    sessionStorage.setItem('idChat', json);
                    Buscar();
                    getUsuarioChat();
              
            }
            else {
               
            }
        }
    }
    xmlhttp.send();

}

function Buscar(){

    var xmlhttp = new XMLHttpRequest();
   if(document.getElementById('txtBuscar').value != ""){
    xmlhttp.open("GET", servidor + '/Usuarios/GetUsuariosbyName/'+document.getElementById('txtBuscar').value+'/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(usuarios){
                if(usuarios.idUsuario !=  localStorage.getItem('id')){  
                    if (usuarios.foto == null)
                    { usuarios.foto  = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";  }
                     template +=
                     `
                     <li class="clearfix" onclick="Chatear(${usuarios.idUsuario})">
                     <img src="${usuarios.foto}" alt="avatar" width="45" height="45">
                     <div class="about">
                         <div class="name">${usuarios.NombreUsuario}</div>
                         <div class="status" ' `;if(usuarios.visto > 0){ template += ` style="color:red;" `}; template +=` > Mensajes sin leer : ${usuarios.visto}</div>                                            
                     </div>
                    </li>

                     `;
                    }
                });
                
                console.log(template);
                document.getElementById('lista').innerHTML=template;
                getUsuarioChat();

            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();
   }
   else{
    ListarUsusario();
   }
}
