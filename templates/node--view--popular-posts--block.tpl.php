<li> 		
	<div class="preloader">
		<a href="<?php echo $node_url; ?>" class="bwWrapper single-image">
			<img alt="" src="<?php echo file_create_url($node->field_widget_image['und'][0]['uri']); ?>">
		</a>	
	</div>
	<div class="post-holder">
		<a href="<?php echo $node_url; ?>"><h6><?php echo $title; ?></h6></a>
		<?php
      $teaser = render($content['body']);
      echo substr($teaser, 0, 50)."...";
    ?>
		<span><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span>
	</div><!--/ .post-holder-->
</li>

