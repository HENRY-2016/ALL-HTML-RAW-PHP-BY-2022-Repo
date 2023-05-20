<?php if (count($loginerrors) > 0) : ?>
	<div class="error" >
		<?php foreach($loginerrors as $loginerrors):?>
			<p><?php echo $loginerrors ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>