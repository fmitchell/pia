<div class="gallery-block">
	<ul class="gallery">
		<?php
		$switcher = '';
		$i = 1;
		foreach ($rows as $id => $row): ?>
			<?php print $row; ?>
			<?php $switcher .= '<li><a href="#">'.$i++.'</a></li>'; ?>
		<?php endforeach; ?>
	</ul>
	<ul class="swicher">
		<?php print $switcher; ?>
	</ul>
</div>