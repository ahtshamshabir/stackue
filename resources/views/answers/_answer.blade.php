<answer :answer="{{$answer}}" inline-template>
	<div class="media post">
		@include('shared._vote',['model' => $answer])
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
							@can('update', $answer)
								<a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
							@endcan
							@can('delete', $answer)
								<form class="form-delete"
									  action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}"
									  method="post">
									{{--												{{method_field('DELETE')}}--}}
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-sm btn-outline-danger"
											onclick="return confirm('Are you sure?')">Delete
									</button>
								</form>
							@endcan
						</div>
					</div>
					<div class="col-4">

					</div>
					<div class="col-4">
						<user-info :model="{{$answer}}" label="Answered"></user-info>
					</div>
				</div>
			</div>
		</div>
	</div>
</answer>