<?php if(!$page): ?>
<?php
	if(isset($node->field_image['und'][0])){
		$nimage = theme('image_formatter',
					array('item' => $node->field_image['und'][0],
						'image_style' => 'downloads',
						'path' => array('path' => 'node/'.$node->nid,'options' => '')
				));
		if($nimage){
			echo '<div class="image">'.$nimage.'</div>';
		}
	}
	if(isset($node->field_pdf_document['und'][0])){
		$file_size = format_size($node->field_pdf_document['und'][0]['filesize']);
		$file_url = file_create_url($node->field_pdf_document['und'][0]['uri']);
	}
?>
<div class="holder">
	<div class="title">
		<?php if($file_url): ?>
			<h3><a href="<?php print $file_url; ?>"><?php print $title; ?></a></h3>
		<?php else: ?>
			<h3><?php print $title; ?></h3>
		<?php endif; ?>
	</div>
	<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	?>
	<?php print render($content); ?>
</div>
<?php else: ?>
<div class="container">
	<?php
	if(isset($node->field_image['und'][0])){
		$nimage = theme('image_formatter',
					array('item' => $node->field_image['und'][0],
						'image_style' => 'news',
						'path' => array('path' => 'node/'.$node->nid,'options' => '')
				));
		if($nimage){
			echo '<div class="image">'.$nimage.'</div>';
		}
	}
	?>
	<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	print render($content); ?>
</div>
<?php endif; ?>