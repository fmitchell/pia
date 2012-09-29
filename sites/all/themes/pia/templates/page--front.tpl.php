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
		<div class="visual-block">
			<?php print render($page['home_gallery']); ?>
			<div class="section">
				<?php print render($page['home_right']); ?>
			</div>
		</div>
		<div class="items-block">
			<div class="boxes">
				<?php print render($page['home_content']); ?>
				<div class="boxright">
					<?php print render($page['social']); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<div class="holder">
		<?php print render($page['footer']); ?>
	</div>
</div>