//var servidor = "https://backpracticapro.herokuapp.com/";
var servidor = "http://localhost:777";
addEventListener("load", load)
function load() {
    


    
}


function Comprar(){
    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Usuarios/CompraMoneda', true);
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

    var valido = 0;




    if(document.getElementById("Tarjeta").value === null || document.getElementById("Tarjeta").value  === "")
    {
        valido =1;

        Swal.fire({
            title: 'Numero de tarjeta obligatorio',
          })
    }
     
    if(document.getElementById("nombre").value === null || document.getElementById("nombre").value === "")
    {
        valido =1;
        Swal.fire({
            title: 'Nombre en la tarjeta obligatorio',
          })
    }



    if(document.getElementById("CVV").value.length < 3 )
    {
        valido =1;
        if(document.getElementById("CVV").value === null || document.getElementById("CVV").value === "")
        {
            Swal.fire({
                title: 'CVV obligatorio',
              })
        }else
        {
            Swal.fire({
                title: 'CVV obligatorio',
              })
        }


    }

   
    if(document.getElementById("VtoA").value === null || document.getElementById("VtoA").value === "" || document.getElementById("VtoM").value === null || document.getElementById("VtoM").value === "")
    {
        valido =1;
        document.getElementById("Vtoa").style.visibility = "visible"; 
        Swal.fire({
            title: 'Fecha de vencimiento obligatorio',
          })
    }
    else{



        var year = new Date().getFullYear().toString().substr(-2)

       if(document.getElementById("VtoA").value < year)
       {
          valido =1;

               Swal.fire({
            title: 'Tarjeta vencida',
            })
        }
        else
        {
            if(document.getElementById("VtoA").value === year)
            {
               
                var MES = new Date().getMonth().toString()
                MES = (parseInt(MES) + 1).toString();
                if( parseInt(document.getElementById("VtoM").value) < parseInt(MES))
                {
                   valido =1;

                        Swal.fire({
                     title: 'Tarjeta vencida',
                     })
                 }
             }
        }
        
    }



    if($("cantidad").value === null || $("cantidad").value === "")
    {
        valido =1;
        Swal.fire({
            title: 'Cantidad obligatorio',
          })
    }



    if(valido == 0)
    {
    fileContent.append("idU", localStorage.getItem('id'));
    fileContent.append("cantidad", document.getElementById("cantidad").value); 
    xmlhttp.send(fileContent);
   
    Swal.fire({
        title: 'Se realizo la compra de moneda',
        confirmButtonText: 'OK',
        confirmButtonColor: '#28a745',
      }).then((result) => {

        if (result.isConfirmed) {
           
            window.location.href = "../Moneda/historialMoneda.php";

        } 
      })

    }

}
