<?php
/**
 * @file
 * Goodnex's theme implementation to display a single Drupal page.
 */
?>

<div id="wrapper">
  <header id="header">
    <div class="container">
    
      <div class="eight columns">

	      <?php if (isset($page['header_left'])) : ?>
		      <?php print render($page['header_left']); ?>
		    <?php endif; ?>
	    
	      <?php if ($logo): ?>
	        <h1 class="logo">
			      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
			        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			      </a>
	        </h1>
		    <?php endif; ?>
		    
		    <?php if ($site_name || $site_slogan): ?>
		      <div id="name-and-slogan"<?php if ($disable_site_name && $disable_site_slogan) { print ' class="hidden"'; } ?>>
		
		        <?php if ($site_name): ?>
		          <h1 id="site-name"<?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
		            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
		          </h1>
		        <?php endif; ?>
		
		        <?php if ($site_slogan): ?>
		          <div id="site-slogan"<?php if ($disable_site_slogan) { print ' class="hidden"'; } ?>>
		            <?php print $site_slogan; ?>
		          </div>
		        <?php endif; ?>
		
		      </div> <!-- /#name-and-slogan -->
		    <?php endif; ?>
		    
      </div>
      
      <div class="eight columns">
        <?php print render($page['header_right']); ?>
     </div>  
     
     <div class="clear"></div>
     
     <div class="sixteen columns">
				<div class="menu-container clearfix">
					<nav id="navigation" class="navigation">
					  <div class="menu">
					    <?php print render($page['menu']); ?>
					  </div>  
					</nav>
					
					<div class="search-wrapper">

						<form method="post" action="/">

							<p>
								<input name="s" id="s" type="text">
								<button type="submit" class="submit-search">Search</button>
							</p>

						</form>

					</div><!--/ .search-wrapper--> 
					
				</div>
     </div>
     
    </div>  				
	</header>
	<?php print render($page['before_content']); ?>
  <section id="content">
	  <div class="container">
	   
		  <div class="<?php if ( ($page['sidebar']) ) { echo "twelve columns";}  else { echo "sixteen columns"; } ?>">
				  
			  <?php print $messages; ?>
			  
	     	<?php if ($tabs = render($tabs)): ?>
				  <div id="drupal_tabs" class="tabs ">
				    <?php print render($tabs); ?>
				  </div>
			  <?php endif; ?>
	      <?php print render($page['help']); ?>
	      <?php if ($action_links): ?>
	        <ul class="action-links">
	          <?php print render($action_links); ?>
	        </ul>
	      <?php endif; ?>
	
			  <?php if (isset($page['content'])) { print render($page['content']); } ?>
			  
			</div>
		  
		  <?php if ( ($page['sidebar']) ) : ?>
		  <div class="four columns">
		    <?php print render($page['sidebar']); ?>
		  </div>
		  <?php endif; ?>
		    
    </div>
  </section> 
 
  <?php print render($page['after_content']); ?>

  <footer id="footer">
    <div class="container">
		  
	    <div class="four columns">
	      <?php if (isset($page['footer_1'])) : ?>
			    <?php print render($page['footer_1']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="four columns">
	      <?php if (isset($page['footer_2'])) : ?>
			    <?php print render($page['footer_2']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="four columns">
	      <?php if (isset($page['footer_3'])) : ?>
			    <?php print render($page['footer_3']); ?>
			  <?php endif; ?>
	    </div>
	    
	    <div class="four columns">
	      <?php if (isset($page['footer_4'])) : ?>
			    <?php print render($page['footer_4']); ?>
			  <?php endif; ?>
	    </div>

      <div class="clear"></div>
      
      <div class="sixteen columns">
        <div class="adjective clearfix">
		   		    
				  <?php if (isset($page['footer_bottom'])) : ?>
				    <?php print render($page['footer_bottom']); ?>
				  <?php endif; ?>
		  
		    </div>
      </div>
	  </div>  
	</footer>
	
</div>	
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.easing.1.3.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/layerslider/js/jquerytransit.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/layerslider/js/layerslider.transitions.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.cycle.all.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.blackandwhite.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.jcarousel.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.jflickrfeed.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/jquery.touchswipe.min.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/config.js"></script>
<script src="<?php global $parent_root; echo $parent_root; ?>/js/custom.js"></script>