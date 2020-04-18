<answer :answer="<?php echo e($answer); ?>" inline-template>
	<div class="media post">
		<vote :model="<?php echo e($answer); ?>" name="answer"></vote>
		<div class="media-body">
			<form id="form" v-if="editing" action="#" @submit.prevent="update">
				<div class="form-group">
					<textarea rows="10" v-model="body" class="form-control" required></textarea>
				</div>
				<Button class="btn btn-primary" type="submit" :disabled="isInvalid">Update</Button>
				<Button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</Button>
			</form>
			<div v-else>
				<div v-html="bodyHtml"></div>
				<div class="row">
					<div class="col-4">
						<div class="ml-auto">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $answer)): ?>
								<a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $answer)): ?>
								<button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-4">

					</div>
					<div class="col-4">
						<user-info :model="<?php echo e($answer); ?>" label="Answered"></user-info>
					</div>
				</div>
			</div>
		</div>
	</div>
</answer>