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

						<?php
          $block = module_invoke('search', 'block_view', 'search');
          print render($block); 
?>

					</div><!--/ .search-wrapper--> 
					
				</div>
     </div>
     
    </div>  				
	</header>
	<?php print render($page['before_content_no_wrap']); ?>
  <section id="content">
	  <div class="container">
	    
	    <?php print render($page['before_content']); ?>
	   
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