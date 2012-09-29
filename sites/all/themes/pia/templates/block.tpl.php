<?php if(($block->region == 'right' || $block->region == 'right_nav' || $block->region == 'right_nav_types') && $block->module == 'menu_block'): ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
		<?php if ($block->subject): ?>
			<div class="heading orange">
				<h3><?php print strtoupper($block->subject); ?></h3>
			</div>
		<?php endif;?>
	<?php print render($title_suffix); ?>
    <?php print $content ?>
</div>
<?php elseif($block->region == 'right'): ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
		<?php if ($block->subject): ?>
			<div class="heading">
				<h3><?php print strtoupper($block->subject); ?></h3>
			</div>
		<?php endif;?>
	<?php print render($title_suffix); ?>
    <?php print $content ?>
</div>
<?php elseif($block->region == 'news'): ?>
<div id="<?php print $block_html_id; ?>" class="column <?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
		<?php if ($block->subject): ?>
			<h2><?php print strtoupper($block->subject); ?></h2>
		<?php endif;?>
	<?php print render($title_suffix); ?>
    <?php print $content ?>
</div>
<?php elseif($block->region == 'content'): ?>
<?php print $content ?>
<?php else: ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
		<?php if ($block->subject): ?>
			<h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
		<?php endif;?>
	<?php print render($title_suffix); ?>
    <?php print $content ?>
</div>
<?php endif; ?>