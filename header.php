<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo( 'title' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<a id="logo" href="<?php echo home_url();  ?>"><?php echo get_bloginfo('name');  ?></a>
		<nav id="main-menu">
			<a href="<?php echo wp_login_url(); ?>"><?php _e( 'Log in' ,'tips4trip' ); ?></a>
			<a href="<?php echo wp_registration_url(); ?>"><?php _e( 'Register', 'tips4trip' ); ?></a>
			<a href="<?php echo get_admin_url(); ?>"><?php _e( 'Dashboard' ,'tips4trip' ); ?></a>
			<a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log out' ,'tips4trip' ); ?></a>
		</nav>
		
	</header>
