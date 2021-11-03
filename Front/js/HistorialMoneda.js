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
                    document.getElementById("hmonto").innerHTML  = "Monto actual : $ "+ moneda.Monto;


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
                <div style="text-align: center;">
                <table class="w3-table w3-striped w3-border" style="text-align: center; padding-left: 40%;">
                <tr>
              
                  <td>Fecha de compra</td>
              
                  <td>Cantidad comprada</td>
              
                </tr>`;
                json.map(function(moneda){

                     template +=`
                                         
                <tr>
              
                <td>${moneda.fecha} </td>
            
                <td>${moneda.monto}</td>

                     `;

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