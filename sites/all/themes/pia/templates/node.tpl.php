<?php if(!$page): ?>
<li>
	<?php
	if(isset($node->field_image['und'][0])):
		$nimage = theme('image_formatter',
					array('item' => $node->field_image['und'][0],
						'image_style' => 'faces_of_change',
						'path' => array('path' => 'node/'.$node->nid,'options' => '')
				));
		if($nimage){
			echo '<div class="photo">'.$nimage.'</div>';
		}
	endif;
	?>
	<div class="holder">
		<div class="title">
			<h3><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
			<?php if(isset($node->field_subtitle["und"][0]["value"])): ?><strong><?php echo $node->field_subtitle["und"][0]["value"]; ?></strong><?php endif; ?>
		</div>
		<?php
		// We hide the comments and links now so that we can render them later.
		hide($content['comments']);
		hide($content['links']);
		print render($content); ?>
	</div>
</li>
<?php else: ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

</div>
<?php endif; ?>