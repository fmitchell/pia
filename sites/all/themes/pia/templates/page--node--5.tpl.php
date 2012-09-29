<div id="header">
	<?php if ($logo || $site_name): ?>
		<div class="header-holder">
			<?php if ($title): ?>
				<strong class="logo"><a href="<?php print $front_page ?>"><?php print $site_name ?></a></strong>
			<?php else: /* Use h1 when the content title is empty */ ?>
				<h1 class="logo"><a href="<?php print $front_page ?>"><?php print $site_name ?></a></h1>
			<?php endif; ?>
			<div class="slogan"><?php print render($page['slogan']); ?></div>
		</div>
	<?php endif; ?>
	<div class="header-block">
		<?php print render($page['header']); ?>
	</div>
</div>
<div id="main">
	<div class="main-holder">
		<div class="main-frame">
			<div id="content">
				<?php print render($page['before_title']); ?>
				<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?>
					<h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
				<?php endif; ?>
				<?php print render($title_suffix); ?>
				<?php print render($page['after_title']); ?>
				<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($tabs2); ?>
				<?php print $messages; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<div class="columns">
					<div class="columns-holder">
						<?php print render($page['news']); ?>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<?php if($page['right_nav_types']): ?>
					<?php print render($page['right_nav_types']); ?>
				<?php else: ?>
					<?php print render($page['right_nav']); ?>
				<?php endif; ?>
				<?php print render($page['right']); ?>
				<?php print render($page['social']); ?>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<div class="holder">
		<?php print render($page['footer']); ?>
	</div>
</div>