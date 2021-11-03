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
        alert("Numero de tarjeta obligatorio");
    }
     
    if(document.getElementById("nombre").value === null || document.getElementById("nombre").value === "")
    {
        valido =1;
        alert("Nombre en la tarjeta obligatorio");
    }



    if(document.getElementById("CVV").value.length < 3 )
    {
        valido =1;
        if(document.getElementById("CVV").value === null || document.getElementById("CVV").value === "")
        {
    
            alert("CVV obligatorio");
        }else
        {
        alert("CVV obligatorio");
        }


    }

   
    if(document.getElementById("Vto").value === null || document.getElementById("Vto").value === "")
    {
        valido =1;
        document.getElementById("Vto").style.visibility = "visible"; 

        alert("Fecha de vencimiento obligatorio");
    }

//    if(Date(document.getElementById("Vto").value).getDate() < Date().getDate())
//    {
//        valido =1;
//        alert("Tarjeta vencida");

//    }


    if($("cantidad").value === null || $("cantidad").value === "")
    {
        valido =1;
        alert("Cantidad obligatorio");
    }



    if(valido == 0)
    {
    fileContent.append("idU", localStorage.getItem('id'));
    fileContent.append("cantidad", document.getElementById("cantidad").value); 
    xmlhttp.send(fileContent);
   
    alert("Compra realizada");

    window.location.href = "../Moneda/historialMoneda.php";
    }

}
