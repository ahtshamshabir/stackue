<a title="Click to mark as favorite question (Click again to undo)"
   class="<?php echo e(Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '')); ?> favorite mt-2"
   href="#"
   onclick="event.preventDefault();document.getElementById('favorite-question-<?php echo e($model->id); ?>').submit();">
	<i class="fas fa-star fa-2x"></i>
	<span class="favorites-count"><?php echo e($model->favorites_count); ?></span>
</a>
<form id="favorite-question-<?php echo e($model->id); ?>"
	  action="/questions/<?php echo e($model->id); ?>/favorites" method="post" hidden>
	<?php echo csrf_field(); ?>
	<?php if($model->is_favorited): ?>
		<?php echo method_field('DELETE'); ?>
	<?php endif; ?>
</form>