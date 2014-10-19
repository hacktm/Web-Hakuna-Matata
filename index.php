<?php get_header(); ?>

<?php
	global $theme;
	$categories = get_categories( array( 'exclude' => 1 ) );
	$cat_count = array( array( 'Country', 'Articles' ) );
	$cat_links = array();
	foreach( $categories as $category ) {
		$cat_count[] = array( $category->name, intval( $category->count ) );
		$cat_links[ strtoupper($category->slug) ] = get_term_link( $category );
	}
	if( is_author() ) {
		global $usr;
		$usr = get_user_by( 'slug', get_query_var( 'author_name' ) );
		get_template_part('inc/userinfo');
	}
?>
	<div id="main-geo-map" class="full-height <?php if( is_author() ) echo 'has-sidebar'; ?>" data-count='<?php echo json_encode( $cat_count ); ?>' data-links='<?php echo json_encode( $cat_links ); ?>'></div>

<?php get_footer(); ?>
