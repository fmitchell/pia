<?php foreach ($fields as $id => $field):
    $_node = node_load($field->content);
	if($_node){
		if($_node->field_image['und'][0]){
			$image = theme('image_formatter',
					array('item' => $_node->field_image['und'][0],
						'image_style' => 'from_the_field',
						'path' => array('path' => 'node/'.$_node->nid,'options' => '')
				));
			if($image){
				echo '<div class="image">'.$image.'</div>';
			}
		}
		echo '<div class="title">
				<h4>'.l($_node->title, 'node/'.$_node->nid).'</h4>
				<em class="date">'.date('F j, Y', $_node->created).'</em>
			</div>
			<div class="entry-content">
				'.$_node->body["und"][0]["safe_summary"].'
			</div>
			<div class="item">
				<a href="'.url('node/'.$_node->nid).'#comments" class="comments">'.$_node->comment_count.' Comments'.'</a>
			</div>';
	}
endforeach; ?>