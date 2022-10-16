//addEventListener("load", load)
var servidor = "http://localhost:777";
//var servidor = "https://backpracticapro.herokuapp.com/";
GetMonto();
function GetMonto(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/getmontoMoneda/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(moneda){
                    document.getElementById("hmonto").innerHTML  = "Monto actual  ";
                    document.getElementById("hmonto2").innerHTML  = " $ " + moneda.Monto;

                });
                


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

    Hostorial();
}



function Hostorial(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Usuarios/getHistorialMoneda/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = `
                <div  class="row border border-dark rounded" style="text-align: center;">
                <table class="table" style="text-align: center; padding-left: 40%;">
                <tr>
              
                  <td>Fecha </td>
              
                  <td>Monto</td>
              
                </tr>`;
                json.map(function(moneda){
                    if(moneda.monto != 0){
                  var fechaformat = new Date(moneda.fecha); 
                   
                  var fe = [(fechaformat.getDate()).toString().padStart(2, "0"),
                  (parseInt(fechaformat.getMonth().toString().padStart(2, "0")) +1).toString(),
                  fechaformat.getFullYear()].join('-')
                  + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                  fechaformat.getMinutes().toString().padStart(2, "0"),
                  fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 

                     template +=`
                                         
                <tr>
              
                <td>${fe} </td>
            
                <td>$ ${moneda.monto}</td>

                     `;
                    }
                });
                template +=`</table>
                </div>`;
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