@if($model instanceof App\Question)
	@php
		$name = 'question';
		$firstUriSegment = 'questions';
	@endphp
@elseif($model instanceof App\Answer)
	@php
		$name = 'answer';
		$firstUriSegment = 'answers';
	@endphp
@endif
@php
	$formId = $name . "-" . $model->id;
	$formAction = "$firstUriSegment/$model->id/vote";
@endphp
<div class="d-flex flex-column vote-controls">
	<a title="This {{$name}} is useful" class="vote-up {{Auth::guest() ? 'off' : ''}}"
	   onclick="event.preventDefault();document.getElementById('up-vote-{{$formId}}').submit();"
	   href="#">
		<i class="fas fa-caret-up fa-3x"></i>
	</a>
	<form id="up-vote-{{$formId}}"
		  action="/{{$formAction}}" method="post" hidden>
		@csrf
		<input type="hidden" name="vote" value="1">
	</form>
	<span class="votes-count">{{$model->votes_count}}</span>
	<a title="This {{$name}} is not useful" class="vote-down {{Auth::guest() ? 'off' : ''}}"
	   onclick="event.preventDefault();document.getElementById('down-vote-{{$formId}}').submit();"
	   href="#">
		<i class="fas fa-caret-down fa-3x"></i>
	</a>
	<form id="down-vote-{{$formId}}"
		  action="/{{$formAction}}" method="post" hidden>
		@csrf
		<input type="hidden" name="vote" value="-1">
	</form>
	@if($model instanceof App\Question)
		<favorite :question="{{$model}}"></favorite>
	@elseif($model instanceof App\Answer)
		<accept :answer="{{$model}}"></accept>
	@endif
</div>