<?php
require "funciones.php";
require "head.php";
require "header.php";
?>  








<style type="text/css">
  iframe {
    width: 100%!important;
    height: 400px;
    margin-bottom: 20px;
  }
</style>
<!--Google map-->
<div id="map-container">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2759.303330080325!2d-58.364830932788!3d-34.670278094523184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1572448950085!5m2!1ses!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
<!--Google Maps-->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> CONSULTAS
                </div>
                <div class="card-body">
                    <form class="form" id="fc" action="contacto.php" method="POST">
   <h2>Formulario de contacto</h2>

   <div id="res"></div>    
               
   <label>
      <span>Nombre:</span>
      <input type="text" name="nombre" id="name" value="" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
   </label>                             
   <label>
      <span>Mail:</span>
      <input type="text" name="mail" id="mail" value="" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/>
       </label>                             
   <label>
      <span>Mensaje:</span>
      <textarea type="text" name="msj" id="msj" value="" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,200}" required></textarea>
      
   </label>

   

   <input id="send" type="submit" value="Enviar mensaje"/>
</form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i>Direccion</div>
                <div class="card-body">
                    <p>Av. Belgrano 1191</p>
                    <p>1872 Avellaneda</p>
                    <p>Buenos Aires Argentina</p>
                    <p>Email : torresf@itbeltran.com.ar</p>
                    <p>Tel: 4265.0247 / 4265.0342 / 4203.0222 / 4203.0134</p>
                </div>

            </div>
        </div>
    </div>
</div>

<br><br><br><br>
<?php
require "footer.php";
?>