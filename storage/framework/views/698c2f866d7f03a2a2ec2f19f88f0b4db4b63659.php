<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h2>All Questions</h2>
							<div class="ml-auto">
								<a class="btn btn-outline-secondary" href="<?php echo e(route('questions.create')); ?>">Ask
									Question</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php echo $__env->make('layouts._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<?php echo $__env->make('questions._excerpt', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<div class="alert alert-warning"><strong>Sorry!</strong> There are no questions available.</div>
						<?php endif; ?>
					</div>
					<?php echo e($questions->links()); ?>

				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>