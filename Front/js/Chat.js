var servidor = "http://localhost:777";
Listar();
getUsuarioChat();
function getUsuarioChat(){

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

                    
                });
                
            }
            else {
                alert("ocurrio un error");
            }
        }
        
    }

    xmlhttp.send();

}



function Listar(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Chat/getChat/'+ sessionStorage.getItem('idChat'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Chat){
                    var fechaformat = new Date(Chat.FechaMensaje); 
                   
                    var fe = [(fechaformat.getDate()+1).toString().padStart(2, "0"),
                    fechaformat.getMonth().toString().padStart(2, "0"),
                    fechaformat.getFullYear()].join('-')
                    + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                    fechaformat.getMinutes().toString().padStart(2, "0"),
                    fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 
                     template +=``
                     if(Chat.id_usuario == localStorage.getItem('id')){
                        template += `
                      
     
                     <div class="media media-chat media-chat-reverse">
                     <div class="media-body">                
                     <p>  ${Chat.Mensaje}</p>
                     <p class="meta"><time datetime="2018">${fe}</time></p>
                     </div>               
                     </div> 
                     `;}
                     else{

                        template +=  `                      
                        <div class="media media-chat">
                        <div class="media-body">
                        
                        <p>  ${Chat.Mensaje}</p>
                        <p class="meta"><time datetime="2018">${fe}</time></p>
                        </div>               
                        </div>                 
   
                        ` 
                     }

                });
                
                console.log(template);
                document.getElementById('divchat').innerHTML=template;

                var objDiv = document.getElementById("divchat");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            else {
                alert("ocurrio un error");
            }
        }
        
    }

    xmlhttp.send();

}


function comentar(){


    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Chat/Chatear', true);
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
    fileContent.append("idU", localStorage.getItem('id')); 
    fileContent.append("idChat", sessionStorage.getItem('idChat')); 
    fileContent.append("Texto", document.getElementById("textcomentario").value);

    xmlhttp.send(fileContent);

    document.getElementById("textcomentario").value = "";
}

setInterval(function(){Listar();},1000);