<?php foreach ($fields as $id => $field): ?>
	<?php
	$_node = node_load($field->content);
	$gallery = '';
	$switcher = '';
	$url_path = '';
	$i = 1;
	if(isset($_node)):
		if(isset($_node->field_page_url['und'][0])){
			$url_path = array('path' => $_node->field_page_url['und'][0]["url"],'options' => '');
		}
		if(isset($_node->field_image['und'][0])){
			$nimage = theme('image_formatter',
						array('item' => $_node->field_image['und'][0],
							'image_style' => 'gallery',
							'path' => $url_path
					));
		}
		if($nimage){
			echo '<li>'.$nimage.'</li>';
		}
	?>
	<?php endif; ?>
<?php endforeach; ?>