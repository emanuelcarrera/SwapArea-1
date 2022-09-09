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
                
                document.getElementById('titulo').src = '../imagenes/soli1.jpg';
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Solicitudes){

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
                     <a class="font-weight-light">Su articulo</a>
                  

                       <div  class="">
                          
                          <br> `
                          if(Solicitudes.FOTO_ART_ != null){
                            template += `<img width="100" height="100" src=${Solicitudes.FOTO_ART_} >
                            <br> `;
    
                            }
                            else
                            {
                                template += `<img width="100" height="100" src="../imagenes/logo.jpg" >
                                <br> `;
                            }
                          template += `
                          <br>
                          <a class="font-weight-light"> ${Solicitudes.NOMBRE_ARt}</a>
                          <br>
                          <a class="font-weight-light"> Valor: $ ${Solicitudes.VALOR_ART}</a>
                          <br>
                          
                          </div> 
                     </div>

                     <div  class="col-sm-4 border border-dark rounded"  >
                           
                           <a class="font-weight-light">Mi oferta </a>
                           <br>
                           <a class="font-weight-light">Dinero : $ ${Solicitudes.monto} </a>
                           <br>
                        

                     `
                     if(Solicitudes.ID_ART_OFERTA != null)
                     {
                        template += `
                        <a class="font-weight-light">Mi Aticulo</a>
                        <br>
                        `;
                        if(Solicitudes.FOTO_ART_OFERTA != null){
                        template += `<img width="100" height="100" src=${Solicitudes.FOTO_ART_OFERTA} >
                        <br> `;

                        }
                        else
                        {
                            template += `<img width="100" height="100" src="../imagenes/logo.jpg" >
                            <br> `;
                        }
                        template += `
                        <a class="font-weight-light"> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                        <br>
                        <a class="font-weight-light"> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                        <br>
                        `;

                     }     
                    
                    if(Solicitudes.comentario != null)
                    {
                        template +=`<a class="font-weight-light" >Cometario :  ${Solicitudes.comentario} </a>`
                    }
                     template +=
                     `</div>
                     <div  class="col-sm-4 border border-dark rounded"  >
                     
                         <a class="font-weight-light" > Usuario </a>
                          <br>
                        <a class="font-weight-light" >${Solicitudes.NombreUsuario}</a>
                        <br>
                        <div class="row" >
                        <div  class="col-sm-3">
                        </diV>
                        <div  class="col-sm-4">`
                        if(Solicitudes.foto != null){
                            template += `<img src="${Solicitudes.foto}" width="100" height="100" class="rounded-circle" alt="avatar">`;
    
                           }
                           else
                           {
                            template += `<img width="100" height="100" class="rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                               `;
                           }
                           template += `
                          </diV>
                          </diV>
                          <div class="row" >
                        <br>
                          <button class="form-control" onclick="Chatear(${Solicitudes.dueno})" >Contactar</button> 
                          </diV> 
                      </diV>
                     </div>
                     </div>
                     <br>
                     </div>
                     </div>
                     <br>
                     `;

                });
                
                if(template === "")
                {
                    template +=`<img  src="../imagenes/sin solicitudes creadas.jpg" >
                    </br></br></br></br></br></br></br></br></br>`

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
                document.getElementById('titulo').src = '../imagenes/soli2.jpg';
                var json = JSON.parse(xmlhttp.responseText);
                var template2 = ``;
                json.map(function(Solicitudes){
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
                    <a class="font-weight-light">Mi articulo</a>
                      <div class="" >
                      <div  class="">
                         
                         <br> `
                         if(Solicitudes.FOTO_ART_ != null){
                            template2 += `<img width="100" height="100" src=${Solicitudes.FOTO_ART_} >
                           <br> `;
   
                           }
                           else
                           {
                            template2 += `<img width="100" height="100" src="../imagenes/logo.jpg" >
                               <br> `;
                           }
                           template2 += `
                     
                         <a class="font-weight-light"> ${Solicitudes.NOMBRE_ARt}</a>
                         <br>
                         <a class="font-weight-light">Dinero : $ ${Solicitudes.monto} </a>
                         <br>
                      
                         </div>
                         </div> 
                    </div>

                    <div  class="col-sm-4 border border-dark rounded"  >
                          
                          <a class="font-weight-light">Me ofrecen </a>
                          <br>
                          <a class="font-weight-light">Dinero : $ ${Solicitudes.monto} </a>
                       

                    `
                    if(Solicitudes.ID_ART_OFERTA != null)
                    {
                        template2 += `
                       <a class="font-weight-light">Su articulo</a>
                       <br>
                       `;
                       if(Solicitudes.FOTO_ART_OFERTA != null){
                        template2 += `<img width="100" height="100" src=${Solicitudes.FOTO_ART_OFERTA} >
                       <br> `;

                       }
                       else
                       {
                        template2 += `<img width="100" height="100" src="../imagenes/logo.jpg" >
                           <br> `;
                       }
                       template2 += `
                       <a class="font-weight-light"> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                       <br>
                       <a class="font-weight-light"> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                       <br>
                       `;

                    }     
                   
                   if(Solicitudes.comentario != null)
                   {
                    template2 +=`<a class="font-weight-light" >Cometario :  ${Solicitudes.comentario} </a>`
                   }
                    template2 +=
                    `</div>
                    <div  class="col-sm-4 border border-dark rounded"  >
                    
                        <a class="font-weight-light" > Usuario Ofertante</a>
                         <br>
                       <a class="font-weight-light" >${Solicitudes.NombreUsuario}</a>
                       <br>
                       <div class="row" >
                       <div  class="col-sm-3">
                       </diV>
                       <div  class="col-sm-4">`
                       if(Solicitudes.foto != null){
                        template2 += `<img src="${Solicitudes.foto}" width="100" height="100" class="rounded-circle" alt="avatar">`;

                       }
                       else
                       {
                        template2 += `<img width="100" height="100" class="rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" >
                           `;
                       }
                       template2 += `
                         </diV>
                         </diV>
                         <div class="row" >
                       <br>
                         <button class="form-control" onclick="Chatear(${Solicitudes.ofertate})" >Contactar</button> 
                         </diV> 
                     </diV>
                    </div><br>`
                    if(Solicitudes.estado == "0")
                    {
                       template2 +=  `<button class="btn btn-success" type="button" onclick="AceptarSolicitud(${Solicitudes.id_Solicitud})"> Aceptar</button>
                                      <button class="btn btn-danger" type="button" onclick="RechazarSolicitud(${Solicitudes.id_Solicitud})"> Rechazar</button>`
                    }

                    template2 +=  `</div>
                     <br>`



                     template2 +=`</div>
                     </div>
                     <br>
                     
                     `;

                });
                
                if(template2 === "")
                {
                    template2 +=`<img  src="../imagenes/sin solicitudes.jpg" >
                    </br></br></br></br></br></br></br></br></br></br>`

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
                json.map(function(id){
                    sessionStorage.setItem('idChat', id.id_um);
                    window.location.href = "/SwapArea/SwapArea/Front/Pantallas/Chat/Chat.php";
                });
            }
            else {
                alert("ocurrio un error");
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
                        }
                        else {
                            alert("ocurrio un error");
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