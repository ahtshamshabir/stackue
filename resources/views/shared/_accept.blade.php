@can('accept', $model)
	<a title="Mark as best answer (Click again to undo)" class="{{$model->status}} mt-2" href="#"
	   onclick="event.preventDefault();document.getElementById('accept-answer-{{$model->id}}').submit();">
		<i class="fas fa-check fa-2x"></i>
	</a>
	<form id="accept-answer-{{$model->id}}" action="{{route('answers.accept',$model->id)}}" method="post" hidden>
		@csrf
	</form>
@else
	@if ($model->is_best)
		<a title="This is the best answer" class="{{$model->status}} mt-2">
			<i class="fas fa-check fa-2x"></i>
		</a>
	@endif
@endcan