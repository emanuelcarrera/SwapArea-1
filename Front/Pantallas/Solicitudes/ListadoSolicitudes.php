
<?php
require "../head.php";
require "../header.php";
?>	




<body>


</br>
</br>
<div class="container" >

</br>
</br>
<button   class="btn btn-success" id="btnofertas"  type="button" onclick="OfertasbyUsusario()"> Solicitudes recibidas</button>
</br>
</br>
<button class="btn btn-success" id="btnsolictud"  type="button" onclick="solicitudbyUsusario()"> Solicitudes realizadas</button>
</br>

</div>

</br>
</br>
<div class="d-flex align-items-center justify-content-center">  
 <h3> <a id="titulo" > </a> </h3>
</div>
<div id="lista" class="row d-flex align-items-center justify-content-center"> </div>

</body>

<?php
require "../footer.php";

?>	
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../js/misSolicitudes.js"></script>