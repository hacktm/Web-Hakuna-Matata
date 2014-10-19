<?php get_header(); ?>

<?php if( has_post_thumbnail() ) { ?>
	<div class="featured-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>');"></div>
<?php } ?>
<div class="container <?php if( ! has_post_thumbnail() ) echo 'no-featured-image'; ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <h1><?php the_title();?></h1>
	    <div class="details">Written by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author() ?></a> on <?php echo get_the_date(); ?> about <?php
		$cats = get_the_category();
		$cat = reset( $cats );
		echo '<a href="' . get_category_link( $cat->term_id ) . '">' . $cat->cat_name . '</a>';
	    ?></div>
            <div class="content"><?php the_content();?></div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
