<span class="text-muted">{{$label ." ". $model->created_date}}</span>
<div class="media mt-2">
	<a href="{{$model->user->url}}" class="pr-2"><img
				src="{{$model->user->avatar}}" alt="author image"></a>
	<div class="media-body mt-1">
		<a href="{{$model->user->url}}">{{$question->user->name}}</a>
	</div>
</div>