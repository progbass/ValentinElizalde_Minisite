<?php get_header(); ?>



<section id="archive">
	
	<?php if (have_posts()) : ?>
		<?php
			$post = $posts[0]; // Hack. Set $post so that the_date() works.
		?>


		<?php if (is_category()): ?>
			<!-- Title -->
			<h3 class="red_title"><?php echo single_cat_title(); ?></h3>
			
			<!-- Main Post -->
			<div class="main_post">
				<?php the_post(); ?>

				<!-- Cover -->
				<div class="photo_holder full_media">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
				</div>

				<!-- Info -->
				<div class="info_holder">
					<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

					<ul class="social">
						<li class="facebook"><a href="#">Me gusta</a></li>
						<li class="twitter"><a href="#">Twitea</a></li>
						<li class="meta"><?php the_date(); ?></li>
					</ul>
				</div>
			</div>

			<?php
			/* Restore original Post Data */
			//wp_reset_postdata();
			?>





		<?php elseif(is_tag()): ?>
			<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php elseif (is_day()): ?>
			<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php elseif (is_month()): ?>
			<h2>Archive for <?php the_time('F, Y'); ?></h2>
		<?php elseif (is_year()): ?>
			<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<?php elseif (is_author()): ?>
			<h2 class="pagetitle">Author Archive</h2>
		<?php elseif (isset($_GET['paged']) and !empty($_GET['paged'])): ?>
			<h2 class="pagetitle">Blog Archives</h2>
		<?php endif; ?>




		<div class="grid_max_center">

			<!-- BANNERS -->
			<?php get_template_part('content', 'banners'); ?>
			<!-- /BANNERS -->

			<?php get_template_part('loop', 'archive'); ?>
		</div>



	<?php else : ?>
		<div class="grid_max_center">
			<h1 style="text-align: center;">No se encontraron resultados</h1>
		</div>
	<?php endif; ?>

</section>

<?php get_footer(); ?>
