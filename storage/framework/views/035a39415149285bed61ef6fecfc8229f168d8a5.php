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
						<div class="d-flex flex-column vote-controls">
							<a title="This answer is useful" class="vote-up" href="#">
								<i class="fas fa-caret-up fa-3x"></i>
							</a>
							<span class="votes-count">123</span>
							<a title="This answer is not useful" class="vote-down off" href="#">
								<i class="fas fa-caret-down fa-3x"></i>
							</a>
							<a title="Mark as best answer (Click again to undo)" class="vote-accept mt-2" href="#">
								<i class="fas fa-check fa-2x"></i>
							</a>
						</div>
						<div class="media-body">
							<?php echo $answer->body_html; ?>

							<div class="float-right">
								<span class="text-muted">Answered <?php echo e($answer->created_at); ?></span>
								<div class="media mt-2">
									<a href="<?php echo e($answer->user->url); ?>" class="pr-2"><img src="<?php echo e($answer->user->avatar); ?>" alt="author image"></a>
									<div class="media-body mt-1">
										<a href="<?php echo e($answer->user->url); ?>"><?php echo e($answer->user->name); ?></a>
									</div>
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