<script>$(document).ready(main);
 
var contador = 1;
 
function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle(); 
 
		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
 
	});
 
};</script>
<!--<a href="indexad.php"><img style="float:left" src="../img/logo4.png" width="130" height="30" /></a>-->
<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span><img style="float:left" src="../../img/logo4.png" width="160" height="40" /></a>
		</div>
 
		<nav>
			<ul>
				<li><a style="color:#FFF" href="../indexad.php"><span class="icon-home3"></span>Inicio</a></li>
				<li><a style="color:#FFF" href=""><span class="icon-box-remove"></span>Subir</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-folder-open"></span>Archivos</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-address-book"></span>Perfil</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-equalizer"></span>Opciones</a></li>
			</ul>
		</nav>
	</header>


