<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ) ?></title>
		<meta name="author" content="Israel D&iacute;az :: Creative Technologist & Developer">
		<link rel="author" href="http://www.icreate.io">

		<?php wp_head() ?>
    </head>


    <body <?php body_class() ?>>

		<!-- HEADER -->
		<header>
			<div class="grid_max_center">

				<!-- Invasión -->
				<a class="invasion_btn" href="http://invasionrm.com">Invasi&oacute;nRM</a>

				<!-- Desktop Menu -->
				<div id="menu_mobile">
					<!-- Menu Icon -->
					<div class="menu_icon" >
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					</div>

					<!-- Menu -->	
					<?php wp_nav_menu(); ?>
				</div>


				<!-- Title -->
				<h1><a href="<?php echo bloginfo('url')?>">Valent&iacute;n <span>Elizalde</span></a></h1>

				<!-- Desktop Menu -->
				<nav id="menu">
					<?php wp_nav_menu(); ?>
				</nav>
				
			</div>
		</header>	
		<!-- /HEADER -->

		

		<!-- MAIN WRAPPER -->
		<div id="content-wrap">
