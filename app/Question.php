<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	//can be used to set key name for eloquent to auto find the model instance (instead of explicit binding).
	/*public function getRouteKeyName()
	{
		return 'slug';
	}*/
	protected $fillable = ['title','body'];
    public function user()
	{
//		return $this->belongsTo('App\User');
		return $this->belongsTo(User::class);
	}
	public function setTitleAttribute($value)
	{
		$this->attributes['title']=$value;
		$this->attributes['slug']=str_slug($value);
	}
	public function getUrlAttribute()
	{
		return route("questions.show",$this->slug);
	}
	public function getCreatedDateAttribute()
	{
		return $this->created_at->diffForhumans();
	}
	public function getStatusAttribute()
	{
		if($this->answers_count > 0)
		{
			if($this->best_answer_id)
			{
				return "answered-accepted";
			}
			return "answered";
		}
		else
		{
			return "unanswered";
		}
	}
	public function getBodyHtmlAttribute()
	{
		return \Parsedown::instance()->text($this->body);
	}
	public function answers()
	{
		return $this->hasMany(Answer::class);
	}
	public function acceptBestAnswer(Answer $answer)
	{
		$this->best_answer_id = $answer->id;
		$this->save();
	}
}
