<article class="four columns" data-categories="<?php print strip_tags(render($content['field_portfolio_category'])); ?>">

	<div class="preloader">
		<a class="bwWrapper single-image plus-icon" href="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" rel="folio">
			<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" >
		</a>							
	</div><!--/ .preloader-->

	<a class="project-meta" href="<?php echo $node_url; ?>">

		<h6 class="title"><?php print $title ;?></h6>
		<span class="categories"><?php print str_replace(' ', ' / ', strip_tags(render($content['field_portfolio_category']))); ?></span>

	</a><!--/ .project-meta-->						

</article><!--/ .columns-->