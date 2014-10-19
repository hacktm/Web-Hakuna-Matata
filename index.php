<?php get_header(); ?>

<?php
	$categories = get_categories( array( 'exclude' => 1 ) );
	$cat_count = array( array( 'Country', 'Articles' ) );
	$cat_links = array();
	foreach( $categories as $category ) {
		$cat_count[] = array( $category->name, intval( $category->count ) );
		$cat_links[ strtoupper($category->slug) ] = get_term_link( $category );
	}
	if( is_author() ) {
?>
	<div id="user-info" class="full-height">
		<?php
			$user = get_user_by( 'slug', get_query_var( 'author_name' ) );
			$name = get_the_author_meta( 'first_name' , $user->ID ); 
			if( $name == '' )
				$name = ucfirst( get_the_author_meta( 'user_login' , $user->ID ) ); 
		?>
		<h1>Hi. I'm <?php echo $name; ?>!</h1>
		<h3>Where you can find me</h3>

		<p class="social-icons">
			<?php 
				foreach( $theme->social_networks as $network => $name ): 
					$link = get_the_author_meta( $network, $user->ID );
					if( $link != '' ):
			?>
				<a href="<?php echo $link; ?>" target="_blank" class="icon-<?php echo $network; ?>"></a>
			<?php 
					endif;
				endforeach;
			?>
			<a href="<?php echo get_the_author_meta( 'url', $user->ID ); ?>" target="_blank" class="icon-link"></a>
		</p>
		<h3>About me</h3>
		<p class="description"><?php echo get_the_author_meta( 'description', $user->ID ); ?></p>
	</div>
<?php
	}
?>
	<div id="main-geo-map" class="full-height <?php if( is_author() ) echo 'has-sidebar'; ?>" data-count='<?php echo json_encode( $cat_count ); ?>' data-links='<?php echo json_encode( $cat_links ); ?>'></div>

<?php get_footer(); ?>
