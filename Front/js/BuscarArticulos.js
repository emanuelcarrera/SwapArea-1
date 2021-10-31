//addEventListener("load", load)
var servidor = "https://backpracticapro.herokuapp.com";
function load() {   

    $("btnEnviar").addEventListener("click",Buscar);
    

 }
  
 


 jQuery(window).ready(function () { Listar(); });

function Listar(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Articulo/TodosLosArticulos', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = `<DIV>
                <form class="form" action="##" method="post" id="registrationForm">
                <input  class="form-control" id="txtBuscar" placeholder="Buscar" title="enter a location">
                <button class="btn btn-lg btn-success" id="btnEnviar"  type="button" onclick="Buscar()"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </form>
                </DIV>
                </BR>`;
                json.map(function(Articulos){

                     template +=`
                      

                     <div class="col-sm-3">

                     <img src=${Articulos.foto} >
                     <h2>Nombre: ${Articulos.Nombre}</h2>
                     <br>
                     <strong>Descripcion: ${Articulos.Descripcion}</strong>
                     <br>
                     <strong>Valor: ${Articulos.Valor}</strong>
                     <br>
                     <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="btn btn-primary" />
                     <br>
                     </div>

                    

                     `;

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


function Buscar(){

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", servidor + '/Articulo/Buscar/'+document.getElementById('txtBuscar').value, true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = `<DIV>
                <form class="form" action="##" method="post" id="registrationForm">
                <input  class="form-control" id="txtBuscar" placeholder="Buscar" title="enter a location">
                <button class="btn btn-lg btn-success" id="btnEnviar"  type="button" onclick="Buscar()"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </form>
                </DIV>
                </BR>`;
                json.map(function(Articulos){

                     template +=`
                     <div class="col-sm-3">

                     <img src=${Articulos.foto} >
                     <h2>Nombre: ${Articulos.Nombre}</h2>
                     <br>
                     <strong>Descripcion: ${Articulos.Descripcion}</strong>
                     <br>
                     <strong>Valor: ${Articulos.Valor}</strong>
                     <br>
                     <br>
                     <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="btn btn-primary" />
                     <br>
                     </div>

                     `;

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

function Ver(id){

    sessionStorage.setItem('idArticulo', id);
    window.location.href = "/SwapArea/SwapArea/Front/PANTALLAS/Articulos/Articulo.php";


}


function $(valor) {
    return document.getElementById(valor);
}
