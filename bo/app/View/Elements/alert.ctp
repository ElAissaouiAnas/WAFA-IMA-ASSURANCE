<?php
if (!isset($class)) {
	$class = false;
}
?>
<div class="alert<?php echo ($class) ? ' ' . $class : null; ?>">
	<?php echo $message; ?>
</div>