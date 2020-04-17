<?php if($answersCount > 0): ?>
	<div class="row mt-4" v-cloak>
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<h2><?php echo e($answersCount . " " . str_plural('Answer',$question->answers_count)); ?></h2>
					</div>
					<hr>
					<?php echo $__env->make('layouts._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php echo $__env->make('answers._answer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>