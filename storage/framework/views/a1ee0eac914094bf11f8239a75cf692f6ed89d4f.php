<?php $__env->startSection('content'); ?>
	<div class="container">
		<question-page :question="<?php echo e($question); ?>"></question-page>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>