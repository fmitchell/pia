<div class="box">
	<?php
	if(isset($node->field_image['und'][0])){
		$nimage = theme('image_formatter',
					array('item' => $node->field_image['und'][0],
						'image_style' => 'spotlight',
						'path' => array('path' => 'node/'.$node->nid,'options' => '')
				));
		if($nimage){
			echo '<div class="image">'.$nimage.'</div>';
		}
	}
	?>
	<div class="holder">
		<div class="heading orange">
			<h3>FACES OF CHANGE SPOTLIGHT </h3>
		</div>
		<div class="post">
			<div class="title">
				<h4><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
				<?php if(isset($node->field_subtitle["und"][0]["value"])): ?><strong><?php echo $node->field_subtitle["und"][0]["value"]; ?></strong><?php endif; ?>
			</div>
			<div class="entry-content">
				<?php
				// We hide the comments and links now so that we can render them later.
				hide($content['comments']);
				hide($content['links']);
				print render($content); ?>
			</div>
		</div>
	</div>
</div>