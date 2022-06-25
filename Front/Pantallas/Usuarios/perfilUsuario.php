<?php
require "../head.php";
require "../header.php";
?>	


<head>
  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>



<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1> <label id="lblUser"></label> </h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="../imagenes/logo.jpg"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="foto" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" id="archivo" class="text-center center-block file-upload">
        <button  id="btnSubirFoto"  type="submit"> Subir foto</button>
      </div></hr><br>

               
          <div class="panel panel-default">
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
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Datos personales</a></li>
                
                
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombres</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellidos</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
        
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>telefono</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Edad</h4></label>
                              <input  class="form-control" id="edad" placeholder="Edad" title="enter a location">
                          </div>
                      </div>

                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" id="btnEnviar"  type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar Cambios</button>
                               
                            </div>
                      </div>
                      <div>

                      <div class="tab-pane" >
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password Actual</h4></label>
                              <input type="password" class="form-control" name="password" id="passwordold" placeholder="password" title="enter your password.">
                          </div>
                     
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password nueva</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                     <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                      <button class="btn btn-lg btn-success" id="btnpass"  type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Cambiar Contraseña</button>
                   
                        </div>
                        </div>

                       </div>
</div>    

                  	
          </div>
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                 
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Calle y numero</h4></label>
                              <input type="text" class="form-control" name="first_name" id="dimicilio" placeholder="Calle" title="enter your first name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Ciudad</h4></label>
                              <select class="custom-select form-control" id="departamento">
                              </select>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Provincia</h4></label>
                             <select class="custom-select form-control" id="provincia">
                             </select>
                      </select>
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" id="guardarDomiciclio" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Añadir domicilio</button>
                               	
                            </div>
                      </div>
                      </div>
   
 </div>

              	
 </div>               
 </div>           
           
  
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="../../js/UsuarioPerfil.js"></script>

