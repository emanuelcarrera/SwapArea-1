<?php
require "../head.php";
require "../header.php";
?>	

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-md-6">
<div class="card card-bordered">
              <div class="card-header">
                <h4 class="card-title"><strong>Chat</strong></h4>
				<img id="imgfoto" width="50" height="50" class="rounded-circle" alt="avatar">
                <h5 id="txtnombre" class="btn btn-xs btn-secondary"  data-abc="true"></h5>
              </div>

<div id="chat" class="ps-container ps-theme-default ps-active-y border border-dark rounded" style="overflow-y: scroll !important; height:400px !important;  background-color: #4d5259;">

</div>


<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
<div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div>
<div class="publisher bt-1 border-light">
                <input id="textcomentario" class="publisher-input" type="text" placeholder="Mensaje">
                <span class="publisher-btn file-group">
                  
                </span>
				<button type="button" class="btn " onclick="comentar()" >
                <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a>
				</button>
              </div>

		  <br>
		 
					
		   <br><br>
</div>

<div class="publisher bt-1 border-light">

</div>

</div>
</div>
</div>
</div>
</div>


<link rel="stylesheet" href="../../css/Chat.css" >
<script src="../../js/Chat.js"></script>