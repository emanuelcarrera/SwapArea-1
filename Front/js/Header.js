var servidor = "http://localhost:777";
setUsertData();
ChatVisto();
function setUsertData()
{


   if(localStorage.getItem('id') !== null)
   {
	var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/GetDatosUsuario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {

		document.getElementById("nombreuHeader").visible  =  true;
		document.getElementById("Headerimg").hidden = false;
		document.getElementById("perfil").visible = true;
		document.getElementById("misarticulos").hidden = false;
		document.getElementById("moneda").hidden = false;
		document.getElementById("chat").hidden = false;
		document.getElementById("Solicitudes").hidden = false;
		document.getElementById("log").innerHTML  = "Salir";
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Usuario){

                    document.getElementById("nombreuHeader").innerHTML  =  Usuario.NombreUsuario;

                    if(Usuario.foto === null)
                    {
                        document.getElementById("Headerimg").src ="http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
                    
                    }else{
                        document.getElementById("Headerimg").src =Usuario.foto;
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
   }else{

	document.getElementById("log").innerHTML  = "Login";
	
	document.getElementById("nombreuHeader").visible  =  false;
	document.getElementById("Headerimg").hidden = true;
	document.getElementById("perfil").visible = false;
	document.getElementById("misarticulos").hidden = true;
	document.getElementById("moneda").hidden = true;
	document.getElementById("chat").hidden = true;
	document.getElementById("Solicitudes").hidden = true;
	
   }
}


function ChatVisto(){
    if(localStorage.getItem('id') !== null)
    {
    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Chat/GetVistos/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                json.map(function(Respuesta){

                    if(parseInt(Respuesta.visto)> 0)
                    {
                        document.getElementById("icovisto").style.color = 'Red';
                    }
                    else
                    {
                        document.getElementById("icovisto").style.color = 'WHITE';

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

}


setInterval(function(){ChatVisto();},10000);