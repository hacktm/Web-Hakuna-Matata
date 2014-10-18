<?php get_header(); ?>

<?php
$user = get_user_by( 'login', $_GET['author' ] );
if ( $user && count_user_posts( $user->ID ) ) { //TODO: make real validation; ?>
	<div id="sidebar"></div>
<?php } ?>

<div id="country-map" class="full-height">
</div>

<?php get_footer(); ?>
