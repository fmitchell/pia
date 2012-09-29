<blockquote>
	<q>
		<?php
		// We hide the comments and links now so that we can render them later.
		hide($content['comments']);
		hide($content['links']);
		print render($content); ?>
	</q>
	<?php if(isset($node->field_author['und'][0])): ?>
		<cite><?php print $node->field_author["und"][0]["value"]; ?></cite>
	<?php endif; ?>
</blockquote>