<?php
/**
 * @file
 * Goodnex's theme implementation to display a single Portfolio node.
 */
global $base_url; 
$next = goodnex_pagination($node, 'n');
$prev = goodnex_pagination($node, 'p');

if ($next != NULL) { 
  $next_url = url('node/' . $next, array('absolute' => TRUE));
}

if ($prev != NULL) { 
  $prev_url = url('node/' . $prev, array('absolute' => TRUE));
}

?>

<?php if($page && module_exists('prev_next')): ?>
<div class="portfolio-controls">
  <?php if ($prev != NULL): ?>
	  <a class="controls-prev" href="<?php echo $prev_url; ?>">Prev</a>
	<?php endif; ?>
	<a class="controls-all" href="<?php echo $base_url; ?>/portfolio">all</a>
	<?php if ($next != NULL): ?>
	  <a class="controls-next" href="<?php echo $next_url; ?>">Next</a>
	<?php endif; ?>  
</div><!--/ .portfolio-controls-->	
<?php endif; ?>

<div class="image-gallery-slider">
  <ul>
    <?php print render ($content['field_portfolio_slider']); ?>  
  </ul>
</div>  
  
<?php
  // Hide comments, tags, and links now so that we can render them later.
  hide($content['field_portfolio_slider']);
  hide($content['field_image']);
  hide($content['links']);
  hide($content['field_portfolio_category']);
  print render($content);
?>

<div class="clear"></div>
<div class="divider-solid"></div>