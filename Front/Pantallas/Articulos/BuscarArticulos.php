
<?php
require "../head.php";
require "../header.php";
?>	


<body>
<br>

<br>
<div class="col-md-12">
                <form class="form" action="##" method="post" id="registrationForm">
                <input  class="form-control" id="txtBuscar" placeholder="Buscar" title="enter a location">
                <br>
   
                 <select class="custom-select" id="Categorias">
                 </select>
                 <br>
                  <br>
                <button class="btn btn-success" id="btnEnviar"  type="button" onclick="Buscar()"><i class="fa fa-search"></i>Buscar</button>
                </form>
                
</br>
</br>
</br>
<div id="lista" class="row  h-100 d-flex align-items-center justify-content-center "></diV>





</body>
<?php
require "../footer.php";

?>	





<script src="../../js/BuscarArticulos.js"></script>