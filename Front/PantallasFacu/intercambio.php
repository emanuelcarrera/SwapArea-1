<?php
require "head.php";
require "header.php";
?>  

<div id="home_quicklinks">
                                <a class="quicklink link1" href="#">
                                    <span class="ql_caption">
                                        <span class="outer">
                                            <span class="inner">
                                                <h2>Articulo usuario</h2>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>

                                <a class="quicklink link2" href="#">
                                    <span class="ql_caption">
                                        <span class="outer">
                                            <span class="inner">
                                                <form name="formulario" method="POST" action="guardar_en_la_base_de_datos.php">
                                                <select name="operacion">
                                                <option value="valor_1">Intercambio</option>
                                                <option value="valor_2">Compra</option>
                                                <option value="valor_2">Intercambio y compra</option>
                                                </select>
                                                
                                                </form>

                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>

                                <a class="quicklink link3" href="#">
                                    <span class="ql_caption">
                                        <span class="outer">
                                            <span class="inner">
                                                <h2>Seleccionar articulo a intercambiar</h2>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>
                                    <a href="enviarSolicitud.php" class="btn btn-primary"> Enviar</a>
                                
</div>