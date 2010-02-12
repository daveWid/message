<ul id="message" class="<?php echo $message->type; ?>">
<?php
	if( is_array( $message->message ) ):
		foreach( $message->message as $msg ): ?>
	<li><?php echo $msg; ?></li>
<?php
		endforeach;
	else: ?>
	<li><?php echo $message->message; ?></li>
<?php endif; ?>
</ul>