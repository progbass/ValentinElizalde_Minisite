<?php get_header(); ?>
<section id="single">
	<div class="grid_max_center">
	<?php if (have_posts()) : the_post(); ?>

		<!-- Category Title -->
		<div>
			<h3 class="red_title"><?php echo(get_the_category()[0]->name); ?></h3>
		</div>
		

		
		<!-- Post Title -->
		<div class="info_holder">
			<h2><?php echo the_title(); ?></h2>
			<span><?php echo the_date(); ?></span>
			<span class="cat_name"><?php the_category(); ?></span>
		</div>



		<article id="page-<?php the_ID() ?>">
			
			<!-- COVER -->
			<div class="photo_holder">
				<div class="full_media">
					<?php the_post_thumbnail(); ?>
				</div>
				Foto de portada:  Página oficial
			</div>


			<!-- SOCIAL NETWORKS -->
		    <?php get_template_part('content', 'social_share'); ?>
			<!-- /SOCIAL NETWORKS -->


			<!-- ARTICLE -->
			<?php the_content(); ?>
			<!-- /ARTICLE -->


			<!-- SOCIAL NETWORKS -->
		    <?php get_template_part('content', 'social_share'); ?>
			<!-- /SOCIAL NETWORKS -->


			<!-- Comments -->
			<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="100%" data-numposts="5"></div>

		</article>




		<!-- SIDEBAR -->
		<?php get_sidebar(); ?>
		<!-- /SIDEBAR -->


	<?php else : ?>
		<h1 style="text-align: center;">No se encontraron resultados</h1>
	<?php endif; ?>
	</div>

</section>
<?php get_footer(); ?>
