<?php get_header() ?>

<section id="header_video">
	<div class="grid_max_center">
		<!-- Video Header -->
		<div class="full_media video_holder">

			<?php
			////////////////////////
			//// MAIN VIDEO
			$video_query = new WP_Query(array( 'post_type' => 'videos'));
			$video_code = 'MXUV71600477';
			if($video_query->have_posts()){
				$video_query->the_post();
				$video_code = get_field('video_id');
			}
			/* Restore original Post Data */
			wp_reset_postdata();

			// Get embed iframe
			if (preg_match("/[^\w-]+/", $video_code)) {
			    $video_code = "Invalid video code";
			} else if (preg_match("/^[A-Z0-9]+$/",$video_code)) {
			    $video_code = "http://cache.vevo.com/assets/html/embed.html?video=" . $video_code;
			} else {
			    $video_code = "http://www.youtube.com/embed/" . $video_code;
			}
			?>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLhUcHLp0VtA6T6bSjYhaw-YqXztVqUgol" frameborder="0" allowfullscreen></iframe>
			<!--
			<iframe width="560" height="315" src="<?php echo $video_code; ?>" frameborder="0" allowfullscreen scrolling="no"></iframe>
			-->
		</div>
	</div>
</section>







<section id="home">
	<div class="grid_max_center">
	
	<!-- BANNERS -->
	<?php get_template_part('content', 'banners'); ?>
	<!-- /BANNERS -->


	<!-- CONTENT -->
	<ul>
		<li>
			<?php
			    $category = get_category_by_slug( 'enterate' );
			    $category_link = get_category_link( $category );
			?>
			<h3><a href="<?php echo esc_url( $category_link ); ?>" title="Ent&eacute;rate">Ent&eacute;rate</a></h3>


			<?php
			$renterate_query = new WP_Query( array(
				'cat' => $category->term_id,
				'posts_per_page' => 1 
			));
			$renterate_query->the_post();
			?>

				<div class="full_media photo_holder">
					<a href="<?php the_permalink(); ?>" class="image">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php
	  		$renterate_query->wp_reset_postdata();?>

			<a class="more_btn" href="<?php echo esc_url( $category_link ); ?>" title="Ver todo">Ver Todo</a>
		</li>



		<li>
			<?php
			    $category = get_category_by_slug( 'imagenes' );
			    $category_link = get_category_link( $category );
			?>
			<h3><a href="<?php echo esc_url( $category_link ); ?>" title="Im&aacute;genes">Im&aacute;genes</a></h3>

			<?php
			$imagenes_query = new WP_Query( array(
				'cat' => $category->term_id,
				'posts_per_page' => 1 
			));
			$imagenes_query->the_post();
			?>

				<div class="full_media photo_holder">
					<a href="<?php the_permalink(); ?>" class="image">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php
	  		$imagenes_query->wp_reset_postdata();?>

			<a class="more_btn" href="<?php echo esc_url( $category_link ); ?>" title="Ver todo">Ver Todo</a>
		</li>
		<li>
			<?php
			    $category = get_category_by_slug( 'historias' );
			    $category_link = get_category_link( $category );
			?>
			<h3><a href="<?php echo esc_url( $category_link ); ?>" title="Historias">Historias</a></h3>

			<?php
			$historias_query = new WP_Query( array(
				'cat' => $category->term_id,
				'posts_per_page' => 1 
			));
			$historias_query->the_post();
			?>

				<div class="full_media photo_holder">
					<a href="<?php the_permalink(); ?>" class="image">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php
	  		$historias_query->wp_reset_postdata();?>

			<a class="more_btn" href="<?php echo esc_url( $category_link ); ?>" title="Ver todo">Ver Todo</a>
		</li>


		<li class="spotify">
			<?php
			////////////////////////
			//// SPOTIFY PLAYLIST
			$spotify_query = new WP_Query(array( 'post_type' => 'spotify'));
			$spotify_paylist = 'https://open.spotify.com/user/1277467324/playlist/0vfhcAiJyuEwr11yxeVpKi';
			if($spotify_query->have_posts()){
				$spotify_query->the_post();
				the_content();
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>

		</li>
	</ul>
	<!-- /CONTENT -->

	</div>
</section>



<!-- SOCIAL FEEDS -->
<section id="socialFeeds">
	<div class="grid_max_center">
		<div>

			<!-- TWITTER -->
			<div class="twitter_widget">
				<?php
				////////////////////////
				//// TWITTER ACCOUNT
				$twitter_query = new WP_Query(array( 'post_type' => 'twitter'));
				$twitter_account = 'https://twitter.com/FonovisaRecords';
				if($twitter_query->have_posts()){
					$twitter_query->the_post();
					$twitter_account = get_field('account');
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>
				<a class="twitter-timeline" data-lang="es" data-height="380" data-theme="dark" href="<?php echo $twitter_account ?>"></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>

			<!-- iTunes -->
			<div class="itunes_player">
				<?php
				////////////////////////
				//// ITUNES EMBED
				$itunes_query = new WP_Query(array( 'post_type' => 'itunes'));
				$itunes_url = '//tools.applemusic.com/embed/v1/album/63578818?country=us';
				if($itunes_query->have_posts()){
					$itunes_query->the_post();
					$itunes_url = get_field('itunes_link');
					$itunes_id = explode('/id', parse_url($itunes_url, PHP_URL_PATH))[1];
				}

				/* Restore original Post Data */
				wp_reset_postdata();
				?>
				<iframe src="//tools.applemusic.com/embed/v1/album/<?php echo $itunes_id; ?>?country=us" height="380px" width="100%" frameborder="0"></iframe>
			</div>

		</div>
	</div>
</section>
<!-- /SOCIAL FEEDS -->



<!-- SPONSORS -->
<section id="sponsors">
	<h3>Compra</h3>
	
	<div class="grid_max_center">
		
		<ul>
			<li><a href="https://open.spotify.com/album/5HkVnJr6SoQ5Yt0esgPr00"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_spotify.png" alt="Spotify"></a></li>
			<li><a href=" https://geo.itunes.apple.com/mx/album/tributo-a-valentin-elizalde/id1186928713?app=itunes&1l7nE"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_appleMusic.png" alt="Apple Music"></a></li>
			<li><a href="http://www.claromusica.com/dl.sh/ct/mx/album/2332822"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_claroMusic.png" alt="Claro Música"></a></li>
			<li><a href="http://www.deezer.com/album/15263417?utm_source=deezer&utm_content=album-15263417&utm_term=580972637_1487016299&utm_medium=web"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_deezer.png" alt="Deezer"></a></li>
			<li><a href="https://geo.itunes.apple.com/mx/album/tributo-a-valentin-elizalde/id1186928713?app=itunes&1l7nE"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_iTunes.png" alt="iTunes Store"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_amazonMusic.png" alt="Amazon Music"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_liverpool.png" alt="Liverpool"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_mixup.png" alt="Mixup"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_sears.png" alt="Sears"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_sanborns.png" alt="Sanborns"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_soriana.png" alt="Soriana"></a></li>
			<li class="walmart"><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_walmart.png" alt="Walmart"><span>S&oacute;lo para USA</span></a></li>
			
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_mrCd.png" alt="Mr.CD"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_centralDiscos.png" alt="Centro de Discos Entertainment"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_hitaox.png" alt="Hitbox"></a></li>
			
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_googlePlay.png" alt="Google Play Music"></a></li>
			<li><a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/sponsor_sounds.png" alt="Sounds"></a></li>
		</ul>

	</div>
</section>
<!-- /SPONSORS -->


<?php get_footer() ?>
