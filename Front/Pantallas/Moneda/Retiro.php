<?php
require "../head.php";
require "../header.php";
?>	

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

</br>
</br>
<div  class="row" style="text-align: center;">
<div class="col-4">
</div>
<div class="col-4 border border-dark rounded">
<h1 class="h1" id="hmonto">  </h1>

<h2 class="h2" id="hmonto2">  </h1>
</div>
<div class="col-4">
</div>
</div>
</br>
</br>

<div class="row">
<div class="col-md-4" >
</div>
<div class="col-md-4 d-flex flex-column align-items-center justify-content-center" >

    <input type="number" name="txtMonto" placeholder="Monto" id="txtMonto" class="form-control" >
    </br>
    </br>
    <input type="text" name="txtCBU" placeholder="CBU/CVU" id="txtCBU" class="form-control" >
    </br>
    </br>
    <button id="btnAceptar" class="btn btn-primary"  onClick="AceptarRetiro()">Aceptar</button>
    </br>

    </div>    </div>




</br>
</br>
</br>
</br>
</br>

<?php
require "../footer.php";

?>	
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../js/HistorialMoneda.js"></script>
<script src="../../js/RetiroMoneda.js"></script>
