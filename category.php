<?php get_header(); ?>
<?php  $country_bounds = json_decode( file_get_contents( get_stylesheet_directory() . '/countries.json' ), true ); ?>
<?php
global $theme;
if( isset( $_GET['traveler'] ) )
	$user = get_user_by( 'login', $_GET['traveler' ] );
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
<?php } ?>

<?php $category = strtoupper( get_query_var( 'category_name' ) ); ?>
<div id="country-map" class="full-height <?php if( $user ) echo 'has-sidebar'; ?>" data-country='<?php echo json_encode( $country_bounds[$category] ); ?>' <?php echo $user ? "data-author='" . $user->ID . "'" : '';; ?>>
</div>
<div class="articles">
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
