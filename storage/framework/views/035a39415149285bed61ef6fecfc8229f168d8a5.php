<?php if($answersCount > 0): ?>
	<div class="row mt-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<h2><?php echo e($answersCount . " " . str_plural('Answer',$question->answers_count)); ?></h2>
					</div>
					<hr>
					<?php echo $__env->make('layouts._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="media">
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
						<hr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>