var servidor = "http://localhost:777";
Listar();
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

                     template +=``
                     if(Chat.id_usuario == localStorage.getItem('id')){
                        template += `
                      
                     <div class="col-sm-3">

                     <h2> Yo : ${Chat.Mensaje}</h2>
                     <a>  ${Chat.FechaMensaje} <a>
                     <br>
                     </div>                  

                     `;}
                     else{

                        template +=  `                      
                        <div class="col-sm-3">  
                        <h2> Él  : ${Chat.Mensaje}  </h2>
                        <a>  ${Chat.FechaMensaje} <a>
                        <br>
                        </div>                  
   
                        ` 
                     }

                });
                
                console.log(template);
                document.getElementById('chat').innerHTML=template;

                var objDiv = document.getElementById("chat");
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
}

setInterval(function(){Listar();},1000);