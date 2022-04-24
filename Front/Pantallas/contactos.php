<?php

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
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto text-right">
                        <button type="submit" class="btn btn-primary text-right"><i class="fa fa-pencil"></i> Enviar Consulta</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>3 rue des Champs Elysées</p>
                    <p>75008 PARIS</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>
                </div>

            </div>
        </div>
    </div>
</div>

<br><br><br><br>
<?php
require "footer.php";
?>