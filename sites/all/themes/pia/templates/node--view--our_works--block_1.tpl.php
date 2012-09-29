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
		<div class="heading yellow">
			<h3>PROJECT SPOTLIGHT</h3>
		</div>
		<div class="post">
			<div class="title">
				<h4><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
				<em class="date"><?php print date('F j, Y', $node->created); ?></em>
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