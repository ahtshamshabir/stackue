<div class="media post">
	<?php echo $__env->make('shared._vote',['model' => $answer], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="media-body">
		<?php echo $answer->body_html; ?>

		<div class="row">
			<div class="col-4">
				<div class="ml-auto">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $answer)): ?>
						<a class="btn btn-sm btn-outline-info"
						   href="<?php echo e(route('questions.answers.edit', [$question->id, $answer->id])); ?>">Edit</a>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $answer)): ?>
						<form class="form-delete"
							  action="<?php echo e(route('questions.answers.destroy', [$question->id, $answer->id])); ?>"
							  method="post">
							
							<?php echo method_field('DELETE'); ?>
							<?php echo csrf_field(); ?>
							<button type="submit" class="btn btn-sm btn-outline-danger"
									onclick="return confirm('Are you sure?')">Delete
							</button>
						</form>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-4">

			</div>
			<div class="col-4">
				<?php echo $__env->make('shared._author', [
				'model' => $answer,
				'label' => 'answered'
				], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		</div>
	</div>
</div>