<?php get_header(); ?>
<?php  $country_bounds = json_decode( file_get_contents( get_stylesheet_directory() . '/countries.json' ), true ); ?>
<?php
global $theme;
if( isset( $_GET['traveler'] ) )
	$user = get_user_by( 'login', $_GET['traveler' ] );
else
	$user = false;
if ( $user ) {
	global $usr;
	$usr = $user;
	get_template_part('inc/userinfo');
} ?>

<?php $category = strtoupper( get_query_var( 'category_name' ) ); ?>
<div id="country-map" class="full-height <?php if( $user ) echo 'has-sidebar'; ?>" data-country='<?php echo json_encode( $country_bounds[$category] ); ?>' <?php echo $user ? "data-author='" . $user->ID . "'" : '';; ?>>
</div>
<div class="articles hidden">
	<?php while ( have_posts() ) { the_post() ?>
		<?php
			$pos = array(
				'lat' => get_post_meta( get_the_ID(), 'lat', true ),
				'lng' => get_post_meta( get_the_ID(), 'lng', true )
			);
		?>
		<article id="post-<?php echo get_the_ID(); ?>" data-position='<?php echo json_encode( $pos ); ?>'>
			<h2 class="title"><?php the_title(); ?></h2>
			<div class="excerpt"><?php the_excerpt(); ?></div>
			<a class="link" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'tipsfortrips' ); ?></a>
		</article>
	<?php } ?>

</div>

<?php get_footer(); ?>
