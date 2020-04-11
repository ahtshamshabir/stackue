<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h2>Ask Question</h2>
							<div class="ml-auto">
								<a class="btn btn-outline-secondary" href="<?php echo e(route('questions.index')); ?>">Back to all Questions</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form action="<?php echo e(route('questions.store')); ?>" method="post">
							<?php echo $__env->make('questions._form', ['buttonText'=>'Ask Question'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>