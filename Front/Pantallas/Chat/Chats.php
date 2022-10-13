<?php
require "../head.php";
require "../header.php";
?>	
<link rel="stylesheet" href="../../css/Chats.css" >   
<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <button class="btn btn-success" id="btnEnviar"  type="button" onclick="Buscar()"><i class="fa fa-search"></i></button>
                    </div>
                    <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar">
                </div>
                <ul id="lista" class="list-unstyled chat-list mt-2 mb-0" style="height:450px; overflow-y: scroll;">
                    
                </ul>
            </div>


            <!-- -------------------------------------------------------------------------------------->
            <div id="divchat2" class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img id="imgfoto" src="" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 id="txtnombre" class="m-b-0"></h6>
                              
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">

                        </div>
                    </div>
                </div>
                <div id="divscroll" style="height:400px; overflow-y: scroll;">
                <div class="chat-history">
                    <ul id="divchat" class="m-b-0">
                      
                    </ul>
                    <span id="final"></span>
                </div>
               </diV>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                        <button type="button" class="btn " onclick="comentar()" >
                     <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a>
			  	    </button>
                        </div>
                        <input id="textcomentario" type="text" class="form-control" placeholder="Mensaje">                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require "../footer.php";

?>	
<script src="../../js/BuscarUsuario.js"></script>
<script src="../../js/Chat.js"></script>