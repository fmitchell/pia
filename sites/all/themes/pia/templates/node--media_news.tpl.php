<?php if(!$page): ?>
<?php 
	$pub_date = date("F j, Y",$created);
	$publication_line = $pub_date;
	$pub_title = $node->field_publication_title["und"][0]["value"];
	$pub_author = $node->field_author["und"][0]["value"];
	if ($pub_title && $pub_author) {
		$publication_line .= ' - '.$pub_title.', '.$pub_author;
	} elseif ($pub_title) {
		$publication_line .= ' - '.$pub_title;
	} elseif ($pub_author) {
		$publication_line .= ' - '.$pub_author;
	}
?>
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
			<?php
			$node_link_attr = '';
			if(isset($node->field_url_field["und"][0]["url"])){
				$node_url = $node->field_url_field["und"][0]["url"];
				$node_link_attr = ' target="_blank"';
			}
			?>
			<h3><a href="<?php print $node_url; ?>"<?php print $node_link_attr; ?>><?php print $title; ?></a></h3>
			<?php if(isset($node->field_subtitle["und"][0]["value"])): ?><strong><?php echo $node->field_subtitle["und"][0]["value"]; ?></strong><?php endif; ?>
		<?php print "<em class=\"date\">".$publication_line."</em>"; ?>
		</div>
		<?php print render($content); ?>
	</div>
</li>
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