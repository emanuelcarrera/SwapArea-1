<body>
<?php
  require "../Head.php";
  require "../Header.php"
?>	

<div>
<div id="carousel1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
      </ol>
      <!-- diapositivas -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../imagenes/1.jpeg" alt="">
            <div class="carousel-caption">

            </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../imagenes/2.jpeg" alt="">
            <div class="carousel-caption">

            </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../imagenes/3.jpeg"alt="">
            <div class="carousel-caption">

            </div>
        </div>
      </div>
      <!-- botones de desplazamiento a izquierda y derecha -->      
      <a class="carousel-control-prev" href="#carousel1" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel1" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    

</div>
</br>
</br>
</br>
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


<script type="text/javascript">
$('.carousel').carousel({
     interval: 8000,
     pause:true,
     wrap:false
});

// Call carousel manually
$('#myCarouselCustom').carousel();

// Go to the previous item
$("#prevBtn").click(function(){
    $("#myCarouselCustom").carousel("prev");
});
// Go to the previous item
$("#nextBtn").click(function(){
    $("#myCarouselCustom").carousel("next");
});
</script>

    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="../../js/BuscarArticulos.js"></script>