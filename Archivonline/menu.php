

<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">Archivo Online</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
    

      <ul class="nav navbar-nav">
        <li class="active"><a href="index"></span>Inicio <span class="sr-only">(current)</span></a></li>
   
<!--        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>-->
            
          </ul>
                   <?php
	//Inicio cambio de menus
  
   if (isset($_SESSION['MM_Username'])) 
    {?>
             <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Jose Pereira <span class="icon-menu3"></span></a></li>
              </ul>
              
                <?php } else { ?>
      <?php } 
	  //Cierre de cambio de menus
	  ?>
        </li>
      </ul>
 
    
   
   		 
  
      
</div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>