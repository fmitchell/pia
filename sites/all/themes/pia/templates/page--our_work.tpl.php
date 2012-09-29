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
<div id="main" class="">
	<div class="main-holder">
		<div class="main-frame">
			<div id="content">
				<?php print render($page['before_title']); ?>
				<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
				<?php print render($title_prefix); ?>
				<?php if(!isset($node->field_category_ow["und"])): ?>
					<?php if ($title): ?>
						<h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
					<?php endif; ?>
				<?php endif; ?>
				<?php print render($title_suffix); ?>
				<?php print render($page['after_title']); ?>
				<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($tabs2); ?>
				<?php print $messages; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				<?php if(!empty($page['before_content'])): ?>
				<div class="block1">
					<div class="boxes">
						<?php print render($page['before_content']); ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($node->field_category_ow["und"])):
						$nterm_id = $node->field_category_ow["und"][0]["tid"];
						$nterm = taxonomy_term_load($nterm_id);
						if ($nids = taxonomy_select_nodes($nterm_id, false)) {
							$tnodes = node_load_multiple($nids);
						}
				?>
					<div class="article-block">
						<h1><?php print strtoupper($nterm->name); ?></h1>
						<?php
							if($tnodes): ?>
								<form action="#">
									<fieldset>
										<select onchange="document.location.href=this.options[this.selectedIndex].value;">
										<?php
											echo '<option value="">Select a Project</option>';
											foreach($tnodes as $tnode){
												echo '<option value="'.url('node/'.$tnode->nid).'">'.$tnode->title.'</option>';
											}
										?>
										</select>
									</fieldset>
								</form>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php print render($page['content']); ?>
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