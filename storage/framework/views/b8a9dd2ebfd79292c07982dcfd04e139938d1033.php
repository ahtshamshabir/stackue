<?php if($model instanceof App\Question): ?>
	<?php
		$name = 'question';
		$firstUriSegment = 'questions';
	?>
<?php elseif($model instanceof App\Answer): ?>
	<?php
		$name = 'answer';
		$firstUriSegment = 'answers';
	?>
<?php endif; ?>
<?php
$formId = $name . "-" . $model->id;
$formAction = "$firstUriSegment/$model->id/vote";
?>
<div class="d-flex flex-column vote-controls">
	<a title="This <?php echo e($name); ?> is useful" class="vote-up <?php echo e(Auth::guest() ? 'off' : ''); ?>"
	   onclick="event.preventDefault();document.getElementById('up-vote-<?php echo e($formId); ?>').submit();"
	   href="#">
		<i class="fas fa-caret-up fa-3x"></i>
	</a>
	<form id="up-vote-<?php echo e($formId); ?>"
		  action="/<?php echo e($formAction); ?>" method="post" hidden>
		<?php echo csrf_field(); ?>
		<input type="hidden" name="vote" value="1">
	</form>
	<span class="votes-count"><?php echo e($model->votes_count); ?></span>
	<a title="This <?php echo e($name); ?> is not useful" class="vote-down <?php echo e(Auth::guest() ? 'off' : ''); ?>"
	   onclick="event.preventDefault();document.getElementById('down-vote-<?php echo e($formId); ?>').submit();"
	   href="#">
		<i class="fas fa-caret-down fa-3x"></i>
	</a>
	<form id="down-vote-<?php echo e($formId); ?>"
		  action="/<?php echo e($formAction); ?>" method="post" hidden>
		<?php echo csrf_field(); ?>
		<input type="hidden" name="vote" value="-1">
	</form>
	<?php if($model instanceof App\Question): ?>
		<favorite :question="<?php echo e($model); ?>"></favorite>
	<?php elseif($model instanceof App\Answer): ?>
		<?php echo $__env->make('shared._accept', [
		'model' => $model
		], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
</div>