<?php get_header(); ?>

<?php
global $theme;
if( isset( $_GET['author'] ) )
	$user = get_user_by( 'login', $_GET['author' ] );
else
	$user = false;
if ( $user ) { ?>
	<div id="user-info" class="full-height">
		<?php
			$name = get_the_author_meta( 'first_name' , $user->ID ); 
			if( $name == '' )
				$name = ucfirst( get_the_author_meta( 'user_login' , $user->ID ) ); 
		?>
		<h1>Hi. I'm <?php echo $name; ?>!</h1>
		<h3>My social life</h3>

		<p class="social-icons">
			<?php foreach( $theme->social_networks as $network => $name ): ?>
				<a href="<?php echo get_the_author_meta( $network, $user->ID )?>" target="_blank" class="icon-<?php echo $network; ?>"></a>
			<?php endforeach; ?>
			<a href="<?php echo get_the_author_meta( 'url', $user->ID ); ?>" target="_blank" class="icon-link"></a>
		</p>
		<h3>About me</h3>
		<p class="description"><?php echo get_the_author_meta( 'description', $user->ID ); ?></p>
		<h3>My social posts</h3>
	</div>
<?php } ?>

<div id="country-map" class="full-height">
</div>

<?php get_footer(); ?>
