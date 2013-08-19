<?php

/**
 * @file node.tpl.php
 * Goodnex's template to display a node.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="entry-meta">
			<span class="date"><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span>
			<span class="author"><?php echo t('By'); ?> <?php print $name; ?></span>
			<?php if (render($content['field_tags'])): ?>  
			  <span class="tag"><?php print render($content['field_tags']); ?></span>
			<?php endif; ?>  
			<span class="comments"><a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> comment<?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
		</div><!--/ .entry-meta-->
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
