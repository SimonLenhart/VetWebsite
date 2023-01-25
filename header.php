<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package main
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'maindesign'); ?></a>
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<div class="logoWrapper">
					<div id="logo">
						<a href="<?php echo home_url(); ?>" title="Home"><img src="<?= get_template_directory_uri() . '/img/logo.png' ?>" alt="Website Logo"></a>
					</div><!-- #logo -->
					<div id="sideLogo">
						<a href="<?php echo home_url(); ?>">
							<h3>Tierarztpraxis Remshalden</h3>
						</a>
						<a href="<?php echo home_url(); ?>">
							<h4>Dr. med. vet. Dorit Münker <br>Dr. med. vet. Andreas Lenhart</h4>
						</a>
					</div><!-- #logo -->
				</div>

				<nav id="site-navigation" class="main-navigation">
					<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="line line1"></span>
						<span class="line line2"></span>
						<span class="line line3"></span>
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
		</header><!-- #masthead -->