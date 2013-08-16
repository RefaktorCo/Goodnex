<div class="portfolio-controls">
	<a class="controls-prev">Prev</a>
	<a class="controls-all" href="portfolio-4-columns.html">all</a>
	<a class="controls-next">Next</a>
</div><!--/ .portfolio-controls-->	


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
