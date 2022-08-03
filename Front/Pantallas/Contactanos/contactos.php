<?php

require "../head.php";
require "../header.php";
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
                    <form>
                        <div class="form-group">
                            <label for="name">Asunto</label>
                            <input type="text" class="form-control" id="asunto" aria-describedby="emailHelp" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea class="form-control" id="message" rows="6" ></textarea>
                        </div>
                        <div class="mx-auto text-right">
                        <button class="btn btn-success" id="btnEnviar"  type="button" onclick="EnviarMail()">Enviar Consulta</button>
                  </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>Av. Belgrano 1191, Avellaneda</p>
                    <p>Buenos Aires</p>
                    <p>Argentina</p>
                    <p>Email : swaparea@hotmail.com</p>
                    <p>Tel. +54 11 4265.0247 / 4265.0342</p>
                </div>


            </div>
        </div>
    </div>
</div>

<br><br><br><br>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../js/Contacto.js"></script>

