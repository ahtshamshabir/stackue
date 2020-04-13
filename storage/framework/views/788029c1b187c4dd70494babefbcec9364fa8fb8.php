<div class="media post">
	<div class="d-flex flex-column counters">
		<div class="vote">
			<strong><?php echo e($question->votes_count); ?></strong> <?php echo e(str_plural('vote',$question->votes_count)); ?>

		</div>
		<div class="status <?php echo e($question->status); ?>">
			<strong><?php echo e($question->answers_count); ?></strong> <?php echo e(str_plural('answer',$question->answers_count)); ?>

		</div>
		<div class="view">
			<?php echo e($question->views ." ". str_plural('view',$question->views)); ?>

		</div>
	</div>
	<div class="media-body">
		<div class="d-flex align-items-center">
			<h3 class="mt-0"><a href="<?php echo e($question->url); ?>"><?php echo e($question->title); ?></a></h3>
			<div class="ml-auto">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $question)): ?>
					<a class="btn btn-sm btn-outline-info"
					   href="<?php echo e(route('questions.edit', $question->id)); ?>">Edit</a>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $question)): ?>
					<form class="form-delete"
						  action="<?php echo e(route('questions.destroy', $question->id)); ?>"
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
		<p class="lead">
			Asked by
			<a href="<?php echo e($question->user->url); ?>"><?php echo e($question->user->name); ?></a>
			<small class="text-muted"><?php echo e($question->created_date); ?></small>
		</p>
		<div class="excerpt"><?php echo e($question->excerpt); ?></div>
	</div>
</div>