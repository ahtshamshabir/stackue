<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accept', $model)): ?>
	<a title="Mark as best answer (Click again to undo)" class="<?php echo e($model->status); ?> mt-2" href="#"
	   onclick="event.preventDefault();document.getElementById('accept-answer-<?php echo e($model->id); ?>').submit();">
		<i class="fas fa-check fa-2x"></i>
	</a>
	<form id="accept-answer-<?php echo e($model->id); ?>" action="<?php echo e(route('answers.accept',$model->id)); ?>" method="post" hidden>
		<?php echo csrf_field(); ?>
	</form>
<?php else: ?>
	<?php if($model->is_best): ?>
		<a title="This is the best answer" class="<?php echo e($model->status); ?> mt-2">
			<i class="fas fa-check fa-2x"></i>
		</a>
	<?php endif; ?>
<?php endif; ?>