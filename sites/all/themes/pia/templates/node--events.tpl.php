<?php if (!$page): ?>
<li>
	<h4><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
	<dl>
		<dt>When:</dt>
		<dd><em class="date"><?php print date('F j, Y', $node->field_date["und"][0]["value"]); ?></em></dd>
		<dt>Where:</dt>
		<dd><?php print $node->field_city["und"][0]["value"]; ?></dd>
	</dl>
</li>
<?php else: ?>
<?php
// We hide the comments and links now so that we can render them later.
hide($content['comments']);
hide($content['links']);
print render($content); ?>
<ul class="buttons">
	<?php if(isset($node->field_register_link["und"][0]["display_url"])): ?><li><a href="<?php print $node->field_register_link["und"][0]["display_url"]; ?>"><span class="item1">REGISTER</span></a></li><?php endif; ?>
	<?php if(isset($node->field_sponsor_link["und"][0]["display_url"])): ?><li><a href="<?php print $node->field_sponsor_link["und"][0]["display_url"]; ?>"><span class="item2">SPONSOR</span></a></li><?php endif; ?>
	<?php if(isset($node->field_donate_link["und"][0]["display_url"])): ?><li><a href="<?php print $node->field_donate_link["und"][0]["display_url"]; ?>"><span class="item3">DONATE</span></a></li><?php endif; ?>
</ul>
<?php endif; ?>