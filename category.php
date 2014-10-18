<?php get_header(); ?>

<?php
if( isset( $_GET['author'] ) )
	$user = get_user_by( 'login', $_GET['author' ] );
else
	$user = false;
if ( $user ) { ?>
	<div id="user-info" class="full-height">
		<h1>Hi. I'm <?php echo get_the_author_meta( 'first_name' , $user->ID ); ?>!</h1>
		<h3>My social life</h3>

		<p class="social-icons">
			<a href="#" class="icon-facebook"></a>
			<a href="#" class="icon-twitter"></a>
			<a href="#" class="icon-gplus"></a>
			<a href="#" class="icon-pinterest"></a>
			<a href="#" class="icon-vimeo"></a>
			<a href="#" class="icon-youtube-play"></a>
			<a href="#" class="icon-flickr"></a>
			<a href="#" class="icon-tumblr"></a>
			<a href="#" class="icon-instagram"></a>
			<a href="#" class="icon-stumbleupon"></a>
			<a href="#" class="icon-picasa"></a>
			<a href="#" class="icon-link"></a>
		</p>
		<h3>About me</h3>
		<p class="description"><?php echo get_the_author_meta( 'description', $user->ID ); ?></p>
		<h3>My social posts</h3>
	</div>
<?php } ?>

<div id="country-map" class="full-height">
</div>

<?php get_footer(); ?>
