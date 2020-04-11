<div class="form-group">
	<?php echo csrf_field(); ?>
	<label for="question-title">Question Title</label>
	<input type="text" name="title" value="<?php echo e(old('title', $question->title)); ?>" id="question-title" class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>">
	<?php if($errors->has('title')): ?>
		<div class="invalid-feedback">
			<strong><?php echo e($errors->first('title')); ?></strong>
		</div>
	<?php endif; ?>
</div>
<div class="form-group">
	<label for="question-body">Explain your question</label>
	<textarea type="text" name="body" id="question-body" rows="10" class="form-control <?php echo e($errors->has('body') ? 'is-invalid' : ''); ?>"><?php echo e(old('body',$question->body)); ?></textarea>
	<?php if($errors->has('body')): ?>
		<div class="invalid-feedback">
			<strong><?php echo e($errors->first('body')); ?></strong>
		</div>
	<?php endif; ?>
</div>
<div class="form-group">
	<button type="Submit" class="btn btn-outline-primary btn-lg"><?php echo e($buttonText); ?></button>
</div>