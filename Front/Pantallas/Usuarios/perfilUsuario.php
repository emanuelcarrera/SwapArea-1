<?php
require "../head.php";
require "../header.php";
?>	


<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1> <label id="lblUser"></label> </h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive rounded-circle" width="100" height="100" src="../imagenes/logo.jpg"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="foto" class="avatar img-circle img-thumbnail rounded-circle"  width="200" height="200" alt="avatar">
        <input type="file" id="archivo" class="form-control" >
        <button  id="btnSubirFoto"  class="form-control" type="submit"> Subir foto</button>
      </div></hr><br>

               

          
          


          
        </div><!--/col-3-->
    	<div class="col-sm-9">

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellido</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" title="enter your last name if any.">
                          </div>
                      </div>
        
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Telefono</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Telefono" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" title="enter your email.">
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
                      <hr>
                      <div class="tab-pane" >
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Contraseña Actual</h4></label>
                              <input type="password" class="form-control" name="password" id="passwordold" placeholder="Contraseña" title="enter your password.">
                          </div>
                     
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Contraseña nueva</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña Nueva" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                     <div class="col-xs-6">
                            <label for="password2"><h4>Repetir Contraseña nueva</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="Repetir Contraseña nueva" title="enter your password2.">
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
            
              
             </div><!--/tab-pane-->
             
             <div class="tab-pane" id="messages">
               
               
               
               <hr>
                 
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Calle y numero</h4></label>
                              <input type="text" class="form-control" name="first_name" id="dimicilio" placeholder="Calle" title="enter your first name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          

          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Provincia</h4></label>
                             <select class="custom-select form-control" id="provincia">
                             </select>
                      </select>
                          </div>
                      </div>
                      <div class="col-xs-6">
                              <label for="phone"><h4>Ciudad</h4></label>
                              <select class="custom-select form-control" id="departamento">
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

