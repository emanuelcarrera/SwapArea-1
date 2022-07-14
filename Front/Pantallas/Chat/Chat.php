<?php
require "../head.php";
require "../header.php";
?>	

<div id="chat" style="	height: 300px;
	width: 200px;
	border: 1px solid #ddd;
	background: #f1f1f1;
	overflow-y: scroll;"> 

</div>


          <br>
          <textarea id="textcomentario" class="form-control"></textarea>
		  <br>
		  <button type="button" class="btn btn-success" onclick="comentar()" >
							Comentar
		   </button>


<script src="../../js/Chat.js"></script>