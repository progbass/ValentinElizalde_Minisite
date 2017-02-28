<aside>

	<!-- BANNER -->
	<div class="banners_holder module">
	  <a href="https://UMLE.lnk.to/X8GpaWe"><img src="<?php echo bloginfo('template_directory'); ?>/images/banner_320x250.gif"></a>
	</div>
	<!-- /BANNER -->


	<!-- TRENDING -->
	<?php
	$cat_id = get_the_category( get_the_ID() )[0]->term_id;
	$query = new WP_Query( array(
		'cat' => $cat_id,
		'post__not_in' => array(get_the_ID()),
		'posts_per_page' => 5
	));
  	if($query->have_posts()): ?>

		<div class="related_holder module">
			 		
	  		<!-- Title -->
	  		<h3 class="red_title">Relacionados</h3>


			<ol class="related_list">
		  	<?php
			  while ($query->have_posts()) : $query->the_post(); ?>

			    <!-- ITEM -->
			    <li>
			      <!-- Photo -->
			      <div class="full_media photo_holder">
			        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			      </div>
			      
			      <!-- Info -->
			      <div class="info_holder">
			        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			        <div class="meta_holder">
			          <span class="date"><?php echo get_the_date(); ?></span>
			          <span class="cat_name"><?php the_category(); ?></span>
			        </div>
			      </div>
			    </li>
			    <!-- /ITEM -->

			<?php
			  endwhile; ?>
			</ol>
		</div>

		<?php
		endif;
		wp_reset_postdata();
		?>
		<!-- /TRENDING -->
</aside>