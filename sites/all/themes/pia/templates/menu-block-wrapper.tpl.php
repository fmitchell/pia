<?php
  $variables = array();
  $variables['links'] = $content;
  if($delta == 1){
	$variables['attributes'] = array('id' => 'nav');
  }elseif($delta == 2 || $delta == 3 || $delta == 4 || $delta == 5){
	$variables['attributes'] = array('id' => 'menu');
	$variables['open_close'] = true;
  }else{
	$variables['attributes'] = array();
  }
?>
<?php print menu_block_links($variables) ?>