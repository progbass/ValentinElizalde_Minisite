<ul class="social_share">
  <li class="facebook">
    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="fa fa-facebook fa-lg"><span >Comparte</span></a>
  </li>
  <li class="twitter">
    <a href="http://twitter.com/share?text=<?php urlencode(the_title()); ?>&url=<?php the_permalink(); ?>" class="fa fa-twitter fa-lg"><span>Twittea</span></a>
  </li>
</ul>



<div class="social_counters">
	<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

	<div class="twitter">
		<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
</div>


