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
                
                document.getElementById('titulo').innerText = 'Solicitudes que hice a otros usuarios';
                var json = JSON.parse(xmlhttp.responseText);
                var template = ``;
                json.map(function(Solicitudes){

                    template +=`
                    <div  class="col-sm-9" style="padding: 10px 50px 20px;">
                    <div   style="padding: 10px 50px 20px; with:100%;  margin-top: 4em; border-style: inset;">`
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
                     <table style="width: 100%;  border: 1px solid;">
                     <td  style=" border: 1px solid;">
                          <a>Mi articulo</a>
                          <br>
                          <img width="100" height="100" src=${Solicitudes.FOTO_ART_} >
                          <br>
                          <a> ${Solicitudes.NOMBRE_ARt}</a>
                      
                     </td>

                     <td style=" border: 1px solid;"> 
                           <br>
                           <a>Me ofrecen </a>
                           <br>
                           <a>Dinero : $ ${Solicitudes.monto} </a>

                     `
                     if(Solicitudes.ID_ART_OFERTA != null)
                     {
                        template += `
                        <a>Su articulo</a>
                        <br>
                        <img width="100" height="100" src=${Solicitudes.FOTO_ART_OFERTA} >
                        <br>
                        <a> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                        <br>
                        <a> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                        <br>
                        `

                     }     
                    
                     if(Solicitudes.comentario != null)
                    {
                        template +=`<a style="margin-top: 4em; border-style: solid;">Cometario :  ${Solicitudes.comentario} </a>`
                    }
                     template +=
                     `</td>
                     <td style=" border: 1px solid;" >
                        <a>${Solicitudes.NombreUsuario}</a>
                        <br>
                          <img src="${Solicitudes.foto}" width="100" height="100" class="rounded-circle" alt="avatar">

                     </td>
                     </table>
                     <br>
                     </div>
                     </div>
                     <br>
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


function OfertasbyUsusario(){

    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("GET", servidor + '/Solicitudes/OfertasbyUsusario/'+localStorage.getItem('id'), true);
    xmlhttp.onreadystatechange = function () {
        //Veo si llego la respuesta del servidor
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            //Reviso si la respuesta es correcta
            
            if (xmlhttp.status == 200) {
                document.getElementById('titulo').innerText = 'Solicitudes que me hicieron a otros usuarios';
                var json = JSON.parse(xmlhttp.responseText);
                var template2 = ``;
                json.map(function(Solicitudes){
                    template2 +=`
                    <div  class="col-sm-9" style="padding: 10px 50px 20px;">
                    <div   style="padding: 10px 50px 20px; with:100%;  margin-top: 4em; border-style: inset;">`
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
                     <table style="width: 100%;  border: 1px solid;">
                     <td  style=" border: 1px solid;">
                          <a>Mi articulo</a>
                          <br>
                          <img width="100" height="100" src=${Solicitudes.FOTO_ART_} >
                          <br>
                          <a> ${Solicitudes.NOMBRE_ARt}</a>
                          <br>
                          <a> Valor: $ ${Solicitudes.VALOR_ART}</a>
                      
                     </td>

                     <td style=" border: 1px solid;"> 
                           <br>
                           <a>Me ofrecen </a>
                           <br>
                           <a>Dinero : $ ${Solicitudes.monto} </a>
                           <br>

                     `
                     if(Solicitudes.ID_ART_OFERTA != null)
                     {
                        template2 += `
                        <a>Su articulo</a>
                        <br>
                        <img width="100" height="100" src=${Solicitudes.FOTO_ART_OFERTA} >
                        <br>
                        <a> ${Solicitudes.NOMBRE_ART_OFERTA}</a>
                        <br>
                        <a> Valor: $ ${Solicitudes.VALOR_ART_OFERTA}</a>
                        <br>
                        `

                     }     
                    
                     if(Solicitudes.comentario != null)
                    {
                        template2 +=`<a style="margin-top: 4em; border-style: solid;">Cometario :  ${Solicitudes.comentario} </a>`
                    }
                    template2 +=
                     `</td>
                     <td style=" border: 1px solid;" >
                        <a>${Solicitudes.NombreUsuario}</a>
                        <br>
                          <img src="${Solicitudes.foto}" width="100" height="100" class="rounded-circle" alt="avatar">

                     </td>
                     </table>
                     <br>`

                     if(Solicitudes.estado == "0")
                     {
                        template2 +=  `<button class="btn btn-success" type="button" onclick="AceptarSolicitud(${Solicitudes.id_Solicitud})"> Aceptar</button>
                                       <button class="btn btn-danger" type="button" onclick="RechazarSolicitud(${Solicitudes.id_Solicitud})"> Rechazar</button>`
                     }


                     template2 +=`</div>
                     </div>
                     <br>
                     `;

                });
                
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