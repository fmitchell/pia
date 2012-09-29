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