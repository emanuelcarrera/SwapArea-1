
<?php
require "head.php";
require "header.php";
?>  


<div class="container">
    <div class="row">
  		<div class="col-sm-10"><h1> <label id="lblUser"></label> </h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="../imagenes/logo.jpg"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="container">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="foto" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" id="archivo" class="text-center center-block file-upload">
        <button  id="btnSubirFoto"  type="submit"> Subir foto</button>
      </div></hr><br>

               
          <div class="container">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">swaparea.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Articulos</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Intercambios</strong></span> 37</li>
            
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            
                <li class="active"><a data-toggle="tab" href="#home">Datos personales</a></li>
                
            
            
                <div class="card-body">
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <label for="name">Nombres</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="name" title="enter your name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <label for="last_name">Apellidos</label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
        
          
                      <div class="form-group">
                          <div class="col-md-12">
                             <label for="mobile">Telefono</label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="email">Edad</label>
                              <input  class="form-control" id="edad" placeholder="Edad" title="enter a location">
                          </div>
                      </div>

                     
                      
                      <div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="password">Password Actual</label>
                              <input type="password" class="form-control" name="password" id="passwordold" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="password">Password nueva</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <label for="password2">Verify</label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-md-12">
                                <br>
                      <button class="btn btn-lg btn-success" id="btnpass"  type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Cambiar Contraseña</button>
                   
                     </div>
                    </div>
                    <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="first_name">Calle y numero></label>
                              <input type="text" class="form-control" name="first_name" id="dimicilio" placeholder="Calle" title="enter your first name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="phone">Ciudad</label>
                              <select class="custom-select form-control" id="departamento">
                              </select>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-md-12">
                             <label for="mobile">Provincia</label>
                             <select class="custom-select form-control" id="provincia">
                             </select>
                    </select>
                          </div>
                      </div>

                          

                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                      <div class="form-group">
                           <div class="col-md-12">
                                <br>
                                <button class="btn btn-lg btn-success" id="guardarDomiciclio" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                
                            </div>
                      </div>

                 	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             
                 
                      
              	
  </div>             
             
           
    <?php 
    require "footer.php";
    ?>    
 
 <script src="../../js/UsuarioPerfil.js"></script>