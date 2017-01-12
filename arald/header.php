<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'W3.css' ); ?>" />
</head>
<body>
<img src="LOGOOK.jpg">
<!-- Navbar -->
<div class="w3-top">
  <ul class="w3-navbar w3-theme-d1 w3-card-2 w3-left-align w3-large">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
      <a class="w3-padding-large w3-hover-white w3-large w3-theme-d3" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    </li>
    <li><a href="palaisdarald.html" class="w3-padding-large w3-white">Home</a></li>
    <li class="w3-hide-small"><a href="education.html" class="w3-padding-large w3-hover-white">Education Canine</a></li>
    <li class="w3-hide-small"><a href="magnetisme.html" class="w3-padding-large w3-hover-white">Magnetisme Animal</a></li>
    <li class="w3-hide-small"><a href="pension.html" class="w3-padding-large w3-hover-white">Pension</a></li>
    <li class="w3-hide-small"><a href="tarif.html" class="w3-padding-large w3-hover-white">Tarif</a></li>
    <li class="w3-hide-small"><a href="complement.html" class="w3-padding-large w3-hover-white">Complément</a></li>
    <li class="w3-hide-small"><a href="lien.html" class="w3-padding-large w3-hover-white">Lien & Presse</a></li>
    <li class="w3-hide-small"><a href="Portfolio.html" class="w3-padding-large w3-hover-white">Portfolio</a></li>

  </ul>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-hide w3-theme-d1 w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-large w3-black">
      <li><a class="w3-padding-large" href="education.html">Education Canine</a></li>
      <li><a class="w3-padding-large" href="magnetisme.html">Magnetisme Animal</a></li>
      <li><a class="w3-padding-large" href="pension.html">Pension</a></li>
      <li><a class="w3-padding-large" href="tarif.html">Tarif</a></li>
      <li><a class="w3-padding-large" href="Portfolio.html">Portfolio</a></li>
    </ul>
    </ul>
  </div>
</div>
</body>
</html>

<?php 
// inclusion du menu nommé menu1 dans l'administration
wp_nav_menu(array('menu'=>'Menu1')); 
?>3