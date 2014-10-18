<?php get_header(); ?>

<?php
	$categories = get_categories( array( 'exclude' => 1 ) );
	$cat_count = array( array( 'Country', 'Articles' ) );
	$cat_links = array();
	foreach( $categories as $category ) {
		$cat_count[] = array( $category->name, intval( $category->count ) );
		$cat_links[ strtoupper($category->slug) ] = get_term_link( $category );
	}
?>
	<div id="main-geo-map" class="full-height" data-count='<?php echo json_encode( $cat_count ); ?>' data-links='<?php echo json_encode( $cat_links ); ?>'>
	</div>

<?php get_footer(); ?>
