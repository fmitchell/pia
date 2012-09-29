<div class="title">
	<?php if (!$page): ?>
		<h4><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
	<?php endif; ?>
	<em class="date"><?php print date('F j, Y', $node->created); ?></em>
</div>
<div class="block">
	<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	print render($content); ?>
</div>