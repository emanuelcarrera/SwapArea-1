var servidor = "http://localhost:777";


function EnviarMail(){
    var valido = 0;
    if(document.getElementById("email").value === null || document.getElementById("email").value === "")
    {
        valido =1;
        Swal.fire({
            title: 'Email obligatorio',
          })
    }
    if(document.getElementById("asunto").value === null || document.getElementById("asunto").value === "")
    {
        valido =1;
        Swal.fire({
            title: 'Asunto obligatorio',
          })
    }
    if(document.getElementById("message").value === null || document.getElementById("message").value === "")
    {
        valido =1;
        Swal.fire({
            title: 'Mensaje obligatorio',
          })
    }

   if (valido === 0)
   {

    var xmlhttp = new XMLHttpRequest();
    var fileContent = new FormData();
    xmlhttp.open("POST", servidor + '/Usuarios/MailContacto', true);
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
    fileContent.append("Mail", document.getElementById('email').value); 
    fileContent.append("asunto", document.getElementById('asunto').value); 
    fileContent.append("mensaje", document.getElementById("message").value);

    xmlhttp.send(fileContent);

    Swal.fire({
        title: 'Nos contactaremos via mail en la brevedad',
      })
   }

}