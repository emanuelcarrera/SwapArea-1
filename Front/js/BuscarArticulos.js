//addEventListener("load", load)
//var servidor = "https://backpracticapro.herokuapp.com";

var servidor = "http://localhost:777";
function load() {   

    $("btnEnviar").addEventListener("click",Buscar);
    

 }
  
 
 let $Categorias = document.getElementById('Categorias');

 jQuery(window).ready(function () { Listar(); });
 cargarCategorias();
function Listar(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Articulo/TodosLosArticulos', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Articulos){
                   if(document.getElementById("Categorias").value === "Seleccione"){
                           
                    if (Articulos.foto == null)
                    { Articulos.foto  = "../imagenes/logo.jpg";  }
                     template +=`
                      

                     <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >

                     <img class="card-img-top"  width="200" height="200" src=${Articulos.foto} >
                     <div class="card-body" d-flex flex-column align-items-center justify-content-center>
                     <h5 class="card-title" >${Articulos.Nombre}</h5>
                     <br>
                     <strong class="card-text font-weight-light">Categoría: ${Articulos.Clasificacion}</strong>
                     <br>
                     <strong class="card-text font-weight-light">Valor: ${Articulos.Valor}</strong>
                     <br>
                     <div  class="d-flex align-items-center justify-content-center">
                     <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="form-control" />
                     <br>
                     </div>
                     </div>
                     </div>

                    

                     `;
                   }else{

                        if(document.getElementById("Categorias").selectedOptions[0].text === Articulos.Clasificacion)
                        {

                            if (Articulos.foto == null)
                            { Articulos.foto  = "../imagenes/logo.jpg";  }
                             template +=`
                              
        
                             <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >
        
                             <img class="card-img-top"  width="200" height="200" src=${Articulos.foto} >
                             <div class="card-body" d-flex flex-column align-items-center justify-content-center>
                             <h5 class="card-title" >${Articulos.Nombre}</h5>
                             <br>
                             <strong class="card-text font-weight-light">Categoría: ${Articulos.Clasificacion}</strong>
                             <br>
                             <strong class="card-text font-weight-light">Valor: ${Articulos.Valor}</strong>
                             <br>
                             <div  class="d-flex align-items-center justify-content-center">
                             <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="form-control" />
                             <br>
                             </div>
                             </div>
                             </div>
        
                            
        
                             `;

                        }



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


function Buscar(){

    if(document.getElementById('txtBuscar').value != "")
    {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", servidor + '/Articulo/Buscar/'+document.getElementById('txtBuscar').value, true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Articulos){

                    if(document.getElementById("Categorias").value === "Seleccione"){
                           
                        if (Articulos.foto == null)
                        { Articulos.foto  = "../imagenes/logo.jpg";  }
                         template +=`
                          
    
                         <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >
    
                         <img class="card-img-top"  width="200" height="200" src=${Articulos.foto} >
                         <div class="card-body" d-flex flex-column align-items-center justify-content-center>
                         <h5 class="card-title" >${Articulos.Nombre}</h5>
                         <br>
                         <strong class="card-text font-weight-light">Categoría: ${Articulos.Clasificacion}</strong>
                         <br>
                         <strong class="card-text font-weight-light">Valor: ${Articulos.Valor}</strong>
                         <br>
                         <div  class="d-flex align-items-center justify-content-center">
                         <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="form-control"/>
                         <br>
                         </div>
                         </div>
                         </div>
    
                        
    
                         `;
                       }else{
    
                            if(document.getElementById("Categorias").selectedOptions[0].text === Articulos.Clasificacion)
                            {
    
                                if (Articulos.foto == null)
                                { Articulos.foto  = "../imagenes/logo.jpg";  }
                                 template +=`
                                  
            
                                 <div class="card d-flex align-items-center justify-content-center" style="width: 18rem;" >
            
                                 <img class="card-img-top"  width="200" height="200" src=${Articulos.foto} >
                                 <div class="card-body" d-flex flex-column align-items-center justify-content-center>
                                 <h5 class="card-title" >${Articulos.Nombre}</h5>
                                 <br>
                                 <strong class="card-text font-weight-light">Categoría: ${Articulos.Clasificacion}</strong>
                                 <br>
                                 <strong class="card-text font-weight-light">Valor: ${Articulos.Valor}</strong>
                                 <br>
                                 <div  class="d-flex align-items-center justify-content-center">
                                 <input type="button" onclick="Ver(${Articulos.idArticulo})" value="VER" class="form-control" />
                                 <br>
                                 </div>
                                 </div>
                                 </div>
            
                                
            
                                 `;
    
                            }
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
   else{

    Listar();
   }
}
function cargarCategorias() {

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Articulo/GetCategorias', true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
                let template = '<option class="form-control" selected disabled > Seleccione </option>';
                json.forEach(respuesta => {
                    template += `<option class="form-control" value="${respuesta.idCategoria}">${respuesta.Descripcion}</option>`;
                })
                $Categorias.innerHTML = template;
  
                //GETDomicilio();
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
    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Articulos/Articulo.php";


}


function $(valor) {
    return document.getElementById(valor);
}
