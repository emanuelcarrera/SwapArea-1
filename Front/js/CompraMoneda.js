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

   
    if(document.getElementById("Vto").value === null || document.getElementById("Vto").value === "")
    {
        valido =1;
        document.getElementById("Vto").style.visibility = "visible"; 
        Swal.fire({
            title: 'Fecha de vencimiento obligatorio',
          })
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
