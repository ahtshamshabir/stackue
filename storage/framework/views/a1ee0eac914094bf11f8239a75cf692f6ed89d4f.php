<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<div class="d-flex align-items-center">
								<h1><?php echo e($question->title); ?></h1>
								<div class="ml-auto">
									<a class="btn btn-outline-secondary" href="<?php echo e(route('questions.index')); ?>">Back to all
										Questions</a>
								</div>
							</div>
						</div>
						<hr>
						<div class="media">
							<?php echo $__env->make('shared._vote',['model' => $question], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<div class="media-body">
								<?php echo $question->body_html; ?>

								<div class="row">
									<div class="col-4"></div>
									<div class="col-4"></div>
									<div class="col-4">
										<?php echo $__env->make('shared._author', [
										'model' => $question,
										'label' => 'asked'
										], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->make('answers._index', ['answers'=>$question->answers, 'answersCount'=>$question->answers_count], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('answers._create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>