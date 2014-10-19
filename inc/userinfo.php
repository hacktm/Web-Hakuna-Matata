<?php 
	global $usr;
	global $theme; 
?>
<div id="user-info" class="full-height">
		<?php
			$name = get_the_author_meta( 'first_name' , $usr->ID ); 
			if( $name == '' )
				$name = ucfirst( get_the_author_meta( 'user_login' , $usr->ID ) ); 
		?>
		<h1>Hi. I'm <?php echo $name; ?>!</h1>
		<h3>Where to find me</h3>

		<p class="social-icons">
			<?php 
				foreach( $theme->social_networks as $network => $name ): 
					$link = get_the_author_meta( $network, $usr->ID );
					if( $link != '' ):
			?>
				<a href="<?php echo $link; ?>" target="_blank" class="icon-<?php echo $network; ?>"></a>
			<?php 
					endif;
				endforeach;
			?>
			<a href="<?php echo get_the_author_meta( 'url', $usr->ID ); ?>" target="_blank" class="icon-link"></a>
		</p>
		<h3>About me</h3>
		<p class="description"><?php echo get_the_author_meta( 'description', $usr->ID ); ?></p>
		<h3>Badges</h3>
		<div class="country-badges clearfix">
			<?php
				$icon_classes = array( 'icon-child', 'icon-bicycle', 'icon-bus', 'icon-belowground-rail', 'icon-airport', 'icon-globe' );
				$i = 0;
			?>
			<?php
				$categories = $theme->user_category_count( $usr->ID );
				$user_country_count = count( $categories );
			?>
			<?php foreach( $theme->badges['countries'] as $threshold => $data ): ?>
			
				<div class="badge <?php echo $icon_classes[$i]; ?> <?php if( $user_country_count >= $threshold ) echo 'active'; ?>">
					<div>
						<h4><?php echo $data['title']; ?></h4>
						<p><?php echo $data['description']; ?></p>
					</div>
				</div>
			<?php $i++; endforeach; ?>
		</div>
		<div class="post-badges clearfix">
			<?php
				$icon_classes = array( 'icon-pen', 'icon-pencil', 'icon-pencil-alt', 'icon-pencil-alt-1', 'icon-vector-pencil', 'icon-feather' );
				$i = 0;
				$user_post_count = count_user_posts( $usr->ID );
			?>
			<?php foreach( $theme->badges['posts'] as $threshold => $data ): ?>
				<div class="badge <?php echo $icon_classes[$i]; ?> <?php if( $user_post_count >= $threshold ) echo 'active'; ?>">
					<div>
						<h4><?php echo $data['title']; ?></h4>
						<p><?php echo $data['description']; ?></p>
					</div>
				</div>
			<?php 
					$i++;
				endforeach; 
			?>
		</div>

	</div>
