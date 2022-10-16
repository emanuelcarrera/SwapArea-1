var servidor = "http://localhost:777";


scrollbot();
function scrollbot()
{
    var objDiv = document.getElementById("divscroll");
    objDiv.scrollTop = objDiv.scrollIntoView(false);
    //document.getElementById('final').scrollIntoView(true);
}




function Listar(){

    if (sessionStorage.getItem('idChat') !== null)
    {
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
                   
                    var fe = [(fechaformat.getDate()).toString().padStart(2, "0"),
                    (parseInt(fechaformat.getMonth().toString().padStart(2, "0")) +1).toString(),
                    fechaformat.getFullYear()].join('-')
                    + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                    fechaformat.getMinutes().toString().padStart(2, "0"),
                    fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 
                     template +=``
                     if(Chat.id_usuario == localStorage.getItem('id')){
                        template += `
                    
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">${fe}</span>
                            </div>
                            <div class="message my-message">${Chat.Mensaje}</div>                                    
                        </li>
                     `;}
                     else{

                        template +=  `                      
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">${fe}</span>
                            </div>
                            <div class="message other-message float-right"> ${Chat.Mensaje} </div>
                        </li>                
   
                        ` 
                     }

                });

                console.log(template);
                document.getElementById('divchat').innerHTML=template;

                var element = document.getElementById('divscroll');

                element.scrollTop = element.scrollHeight;
            }
            else {
                alert("ocurrio un error");
            }
        }
        
    }

    xmlhttp.send();
    }
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