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
							<div class="d-flex flex-column vote-controls">
								<a title="This question is useful" class="vote-up <?php echo e(Auth::guest() ? 'off' : ''); ?>"
								   onclick="event.preventDefault();document.getElementById('up-vote-question-<?php echo e($question->id); ?>').submit();" href="#">
									<i class="fas fa-caret-up fa-3x"></i>
								</a>
								<form id="up-vote-question-<?php echo e($question->id); ?>"
									  action="/questions/<?php echo e($question->id); ?>/vote" method="post" hidden>
									<?php echo csrf_field(); ?>
									<input type="hidden" name="vote" value="1">
								</form>
								<span class="votes-count"><?php echo e($question->votes_count); ?></span>
								<a title="This question is not useful" class="vote-down <?php echo e(Auth::guest() ? 'off' : ''); ?>"
								   onclick="event.preventDefault();document.getElementById('down-vote-question-<?php echo e($question->id); ?>').submit();"href="#">
									<i class="fas fa-caret-down fa-3x"></i>
								</a>
								<form id="down-vote-question-<?php echo e($question->id); ?>"
									  action="/questions/<?php echo e($question->id); ?>/vote" method="post" hidden>
									<?php echo csrf_field(); ?>
									<input type="hidden" name="vote" value="-1">
								</form>
								<a title="Click to mark as favorite question (Click again to undo)"
								   class="<?php echo e(Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '')); ?> favorite mt-2"
								   href="#"
								   onclick="event.preventDefault();document.getElementById('favorite-question-<?php echo e($question->id); ?>').submit();">
									<i class="fas fa-star fa-2x"></i>
									<span class="favorites-count"><?php echo e($question->favorites_count); ?></span>
								</a>
								<form id="favorite-question-<?php echo e($question->id); ?>"
									  action="/questions/<?php echo e($question->id); ?>/favorites" method="post" hidden>
									<?php echo csrf_field(); ?>
									<?php if($question->is_favorited): ?>
										<?php echo method_field('DELETE'); ?>
									<?php endif; ?>
								</form>
							</div>
							<div class="media-body">
								<?php echo $question->body_html; ?>

								<div class="float-right">
									<span class="text-muted">Asked <?php echo e($question->created_at); ?></span>
									<div class="media mt-2">
										<a href="<?php echo e($question->user->url); ?>" class="pr-2"><img
													src="<?php echo e($question->user->avatar); ?>" alt="author image"></a>
										<div class="media-body mt-1">
											<a href="<?php echo e($question->user->url); ?>"><?php echo e($question->user->name); ?></a>
										</div>
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