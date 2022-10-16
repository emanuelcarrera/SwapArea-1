var servidor = "http://localhost:777";
//var servidor = "https://backpracticapro.herokuapp.com/";



solicitudbyUsusario();
function solicitudbyUsusario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Solicitudes/solicitudbyUsusario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                
                document.getElementById('titulo').text = 'Solicitudes realizadas';
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Solicitudes){

                    var fechaformat = new Date(Solicitudes.fecha); 
                    var fe = [(fechaformat.getDate()).toString().padStart(2, "0"),
                    (parseInt(fechaformat.getMonth().toString().padStart(2, "0")) +1).toString(),
                    fechaformat.getFullYear()].join('-')
                    + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                    fechaformat.getMinutes().toString().padStart(2, "0"),
                    fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 

                    template +=`
                    <div  class="col-sm-9" style="padding: 10px 50px 20px;">
                    <div class="border border-dark rounded"  style="padding: 10px 50px 20px; with:100%;  margin-top: 4em;">`
                    if(Solicitudes.estado == "0")
                    {
                        template +=`  <a style="color:blue;"> Estado: en espera</a></br>`
                    }
                    if(Solicitudes.estado == "1")
                    {
                        template +=`  <a style="color:green;"> Estado: Aceptado</a></br>`  
                    }
                    if(Solicitudes.estado == "2")
                    {
                        template +=`  <a style="color:red;"> Estado: Rechazado</a></br>`
                    }

                     template +=`
                     <div class="row" >
                     <div  class="col-sm-4 border border-dark rounded" >
                     <div class="d-flex align-items-center justify-content-center">  
                     <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Quiero  </h5>
                     </div>

                       <div  class="">
                       <div class="d-flex align-items-center justify-content-center">  
                       <a class="font-weight-light" style="font-family: Georgia;"> ${Solicitudes.NOMBRE_ARt}</a>
                       </div>
                          <br>
                          <div class="d-flex align-items-center justify-content-center">  
                          `
                          if(Solicitudes.FOTO_ART_ != null){
                            template += `<img width="100" height="100"  class="rounded float-left"  src=${Solicitudes.FOTO_ART_} >
                             `;
    
                            }
                            else
                            {
                                template += `<img width="100"  class="rounded float-left"  height="100" src="../imagenes/logo.jpg" >
                                `;
                            }
                          template += `
                          </div>
                          <br>
                          <div class="d-flex align-items-center justify-content-center">  
                          <a class="font-weight-light" style="font-family: Georgia;"> Valor: $ ${Solicitudes.VALOR_ART}</a>
                          </div> 
                          <br>
                          
                          </div> 
                     </div>`
                     template +=
                     `
                     <div  class="col-sm-4 border border-dark rounded"  >
                     <div class="d-flex align-items-center justify-content-center">  
                     <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Usuario  </h5>
                     </diV>
                          
                          <div class="d-flex align-items-center justify-content-center">  
                        <a class="font-weight-light" style="font-family: Georgia;">${Solicitudes.NombreUsuario}</a>
                        </diV>
                     
                        <div class="row" >
                        <div  class="col-sm-3">
                        </diV>
                        <div  class="col-sm-4">`
                        if(Solicitudes.foto != null){
                            template += `<img src="${Solicitudes.foto}" onclick="Chatear(${Solicitudes.dueno})" width="100" height="100" class="rounded-circle" alt="avatar">`;
    
                           }
                           else
                           {
                            template += `<img width="100" height="100" onclick="Chatear(${Solicitudes.dueno})" class="rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                               `;
                           }


                           template += `
                          </diV>
                          </diV>`

                          if(Solicitudes.comentario != null && Solicitudes.comentario != "")
                          {
                              template +=`<br>  <a class="font-weight-light" style="font-family: Georgia;"> Mi Cometario :  ${Solicitudes.comentario} </a> `
                          }
                          template += ` </div>`

                     template += `<div  class="col-sm-4 border border-dark rounded"  >
                     
                     <div class="d-flex align-items-center justify-content-center">  
                     <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Mi oferta  </h5>
                     </diV>
                        

                     `
                     if(Solicitudes.ID_ART_OFERTA != null)
                     {
                        template += `
                        <div class="d-flex align-items-center justify-content-center">  
                        <a class="font-weight-light" style="font-family: Georgia;"> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                        <br>
                        </div>
                        `;
                        if(Solicitudes.FOTO_ART_OFERTA != null){
                        template += `       <div class="d-flex align-items-center justify-content-center">  <img width="100" height="100" class="rounded float-left"  src=${Solicitudes.FOTO_ART_OFERTA} >
                        </div> `;

                        }
                        else
                        {
                            template += ` <div class="d-flex align-items-center justify-content-center"> <img width="100" height="100" class="rounded float-left"  src="../imagenes/logo.jpg" >
                            </div>`;
                        }
                        template += `
                      
                        <br>
                        <div class="d-flex align-items-center justify-content-center"> 
                        <a class="font-weight-light" style="font-family: Georgia;"> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center"> 
                        <a class="font-weight-light" style="font-family: Georgia;">Dinero extra: $ ${Solicitudes.monto} </a>
                        </div>
                        <br>
                        
                        `;

                     }
                     else{


                        template +=
                        `   <div class="d-flex align-items-center justify-content-center"> 
                        <a class="font-weight-light" style="font-family: Georgia;">Dinero : $ ${Solicitudes.monto} </a>
                        </div>
                        <br>` 
                     }     
                    

                     template +=
                     `</div>
                     </div>
                     <a style="font-family: Georgia;"> Fecha :  ${fe} </a>
                     </div>


                     <br>
                     </div>
                     </div>
                     <br>
                     `;

                });
                
                if(template === "")
                {
                    template +=`<a>No tiene solicitudes</a>
                    </br></br></br></br></br></br></br></br></br></br></br>`;

                }

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


function OfertasbyUsusario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Solicitudes/OfertasbyUsusario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                document.getElementById('titulo').text = 'Solicitudes resibidas';
                var json = JSON.parse(xmlhttp.responseText);
                var template2 = ``;
                json.map(function(Solicitudes){
                    var fechaformat = new Date(Solicitudes.fecha); 
                    var fe = [(fechaformat.getDate()).toString().padStart(2, "0"),
                    (parseInt(fechaformat.getMonth().toString().padStart(2, "0")) +1).toString(),
                    fechaformat.getFullYear()].join('-')
                    + ' ' + [ fechaformat.getHours().toString().padStart(2, "0"),
                    fechaformat.getMinutes().toString().padStart(2, "0"),
                    fechaformat.getSeconds().toString().padStart(2, "0")].join(':'); 
                    template2 +=`
                    <div  class="col-sm-9" style="padding: 10px 50px 20px;">
                    <div class="border border-dark rounded"  style="padding: 10px 50px 20px; with:100%;  margin-top: 4em;">`
                    if(Solicitudes.estado == "0")
                    {
                        template2 +=`  <a style="color:blue;"> Estado: en espera</a></br>`
                    }
                    if(Solicitudes.estado == "1")
                    {
                        template2 +=`  <a style="color:green;"> Estado: Aceptado</a></br>`  
                    }
                    if(Solicitudes.estado == "2")
                    {
                        template2 +=`  <a style="color:red;"> Estado: Rechazado</a></br>`
                    }

                    template2 +=`
                    <div class="row" >
                    <div  class="col-sm-4 border border-dark rounded" >

                    <div class="d-flex align-items-center justify-content-center">  
                    <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Mi articulo  </h5>
                    </diV>
                      <div class="" >
                      <div  class="">
                      <div class="d-flex align-items-center justify-content-center">  
                      <a class="font-weight-light" style="font-family: Georgia;"> ${Solicitudes.NOMBRE_ARt}</a>
                      </diV>
                      <div class="d-flex align-items-center justify-content-center">  
                         <br> `
                         if(Solicitudes.FOTO_ART_ != null){
                            template2 += `<img width="100" class="rounded float-left"  height="100" src=${Solicitudes.FOTO_ART_} >
                           <br> `;
   
                           }
                           else
                           {
                            template2 += `<img width="100" class="rounded float-left" height="100" src="../imagenes/logo.jpg" >
                               <br> `;
                           }
                           template2 += `
                           </diV>
                   
                         <br>
                         <div class="d-flex align-items-center justify-content-center">  
                         <a class="font-weight-light" style="font-family: Georgia;">Valor : $ ${Solicitudes.VALOR_ART} </a>

                         </div>
                         <br>
                      
                         </div>
                         </div> 
                    </div>   `
                    template2 +=
                    `<div  class="col-sm-4 border border-dark rounded"  >
                    <div class="d-flex align-items-center justify-content-center">  
                    <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Usuario  </h5>
                    </diV>
                    <div class="d-flex align-items-center justify-content-center">  
                       <a class="font-weight-light" style="font-family: Georgia;">${Solicitudes.NombreUsuario}</a>
                       </diV>
                       
                       <div class="d-flex align-items-center justify-content-center">  `
                       if(Solicitudes.foto != null){
                        template2 += `<img src="${Solicitudes.foto}" onclick="Chatear(${Solicitudes.ofertante})"  width="100" height="100" class="rounded-circle" alt="avatar">`;

                       }
                       else
                       {
                        template2 += `<img width="100" height="100" onclick="Chatear(${Solicitudes.ofertante})"  class="rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" >
                           `;
                       }

                       
                       template2 += ` </diV>`
                       
                       if(Solicitudes.comentario != null && Solicitudes.comentario != "")
                       {
                        template2 +=`<br> <a class="font-weight-light" style="font-family: Georgia;">Su cometario :  ${Solicitudes.comentario} </a>`
                       }
                        
                       template2 += ` <br>
                    
                      
                     </diV>
                    `
                    template2 += `    <div  class="col-sm-4 border border-dark rounded"  >
                    <div class="d-flex align-items-center justify-content-center">  
                    <h5 class="product-title" style="font-family: 'Alata', sans-serif;"> Oferta  </h5>
                    </diV>


                       

                    `
                    if(Solicitudes.ID_ART_OFERTA != null)
                    {
                        template2 += `
                  
                       
                       <div class="d-flex align-items-center justify-content-center">  
                       <a class="font-weight-light"style="font-family: Georgia;"> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                       </div>
                      
                       <div class="d-flex align-items-center justify-content-center">  
                       `;
                       if(Solicitudes.FOTO_ART_OFERTA != null){
                        template2 += `<img width="100" height="100" class="rounded float-left" src=${Solicitudes.FOTO_ART_OFERTA} >
                        `;

                       }
                       else
                       {
                        template2 += `<img width="100" height="100" class="rounded float-left"  src="../imagenes/logo.jpg" >
                           `;
                       }
                       template2 += `
                       </div>
                       <div class="d-flex align-items-center justify-content-center">  
                       <a class="font-weight-light" style="font-family: Georgia;"> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                       </div>
                       <div class="d-flex align-items-center justify-content-center">  
                       <a class="font-weight-light" style="font-family: Georgia;">Dinero Extra: $ ${Solicitudes.monto} </a>
                       </div>
                       `;

                    }     
                    else{


                        template2 +=
                        `   <div class="d-flex align-items-center justify-content-center"> 
                        <a class="font-weight-light" style="font-family: Georgia;">Dinero : $ ${Solicitudes.monto} </a>
                        </div>
                        <br>` 
                     }     
                    
                   
                    template2 +=
                    `</div>`
                    
                    
                    template2 += `<br>`
                    if(Solicitudes.estado == "0")
                    {
                       template2 +=  `<div style="padding:2px;" > <button class="btn btn-success" type="button" onclick="AceptarSolicitud(${Solicitudes.id_Solicitud})"> Aceptar</button></div>
                       <div style="padding:2px;" >   <button class="btn btn-danger" type="button"  onclick="RechazarSolicitud(${Solicitudes.id_Solicitud})"> Rechazar</button></div>`
                    }

                    template2 +=  ` <div style="padding:2px; font-family: Georgia;">  <a style="padding-right:2px;"> Fecha :  ${fe} </a> </div></div>
                 
                     `



                     template2 +=`</div>
                     </div>
                     <br>
                     
                     `;

                });
                
                if(template2 === "")
                {
                    template2 +=`<a>No tiene ofertas </a>
                    </br></br></br></br></br></br></br></br></br></br></br>`

                }

                console.log(template2);
                document.getElementById('lista').innerHTML=template2;


            }
            else {
                alert("ocurrio un error");
            }
        }
    }

    xmlhttp.send();

}


function Chatear(id)
{

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", servidor + '/Chat/getIdChat/'+localStorage.getItem('id')+'/'+id);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                var json = JSON.parse(xmlhttp.responseText);
               
                    sessionStorage.setItem('idusuariochat', id);
                    sessionStorage.setItem('idChat', json);
                    
                    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Chat/Chats.php";
            }
            else {
               
            }
        }
    }
    xmlhttp.send();

}

function AceptarSolicitud(id){
    Swal.fire({
        title: '¿Esta seguro?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            getAceptar(id);
            vistoSolicitudes();
        } 
      })}


      function RechazarSolicitud(id){
        Swal.fire({
            title: '¿Esta seguro?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Si',
            denyButtonText: `No`,
            confirmButtonColor: '#28a745',
          }).then((result) => {
    
            if (result.isConfirmed) {
               
                var xmlhttp = new XMLHttpRequest();
                var fileContent = new FormData();
                xmlhttp.open("POST", servidor + '/Solicitudes/Rechazarsolicitud', true);
                xmlhttp.onreadystatechange = function () {
                    //Veo si llego la respuesta del servidor
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                        //Reviso si la respuesta es correcta
                        
                        if (xmlhttp.status == 200) {
                            OfertasbyUsusario();
                            vistoSolicitudes();
                        }

                    }
                }
            
                fileContent.append("id", id);
            
                xmlhttp.send(fileContent);
                Swal.fire({
                    title: 'Se a rechazado la solicitud',
                  })
    
    
    
            } 
          })}

          function getAceptar(id)
          {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", servidor + '/Solicitudes/Aceptarsolicitud/'+id, true);
            xmlhttp.onreadystatechange = function () {
                //Veo si llego la respuesta del servidor
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    //Reviso si la respuesta es correcta
                    
                    if (xmlhttp.status == 200) {

                        var json = JSON.parse(xmlhttp.responseText);
                        json.map(function(result){

                             if(result.RESULT == 1){
                                 Swal.fire({
                                title: 'Solicitud aceptada contactece con el usuario para continuar con el intercambio',
                              })}
                             
                             if(result.RESULT == 0){
                                Swal.fire({
                               title: 'No se pudo Aceptar la solicitud porque el comparador no tiene saldo sufuciente',
                             })}



                            })
                        OfertasbyUsusario();
                    }
                    else {
                        alert("ocurrio un error");
                    }
                }
            }
            xmlhttp.send();
          }