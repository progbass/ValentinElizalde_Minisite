
	<?php if (have_posts()): ?>

		<!-- RESULTS LIST -->
		<ol class="results_list">
		<?php
		$counter = 1;
		$banner_displayed = false;
		while (have_posts()) : the_post() ?>

			<?php if( $counter % 4 == 0 && !$banner_displayed):
				$banner_displayed = true; ?>
				<li>
					<article class="banner_holder">
						<div class="banner box">
							<a href="https://UMLE.lnk.to/X8GpaWe"><img src="<?php echo bloginfo('template_directory'); ?>/images/banner_320x250.gif"></a>
						</div>
					</article>
				</li>
			<?php endif ?>

			<li>
				<article id="article-<?php the_ID() ?>" class="article">
					
					<h4 class="red_title"><?php echo single_cat_title(); ?></h4>

					<!-- Cover -->
					<?php if (has_post_thumbnail() and !is_singular()): ?>
					<div class="photo_holder full_media">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
					</div>
					<?php endif; ?>

					<!-- Title -->
					<h2 class="article-title"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; echo get_short_title(get_the_title()); ?><?php if(!is_singular()): ?></a><?php endif; ?></h2>

					<!-- Date -->
					<span class="date_holder"><?php the_date(); ?></span>

					<!-- Social Media -->
					<div class="social_share">
						<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

						<div class="twitter">
							<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
					</div>

				</article>

			</li>
		<?php $counter++;
		endwhile; ?>
		</ol>
		<!-- /RESULTS LIST -->


	<?php else: ?>
		<p>No se encontraron resultados.</p>
	<?php  endif; ?>

	
