<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
//	public function __construct()
//	{
//		$this->middleware('auth', ['except' => ['index','show']]);
//	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Question $question, Request $request)
	{
//        $request->validate([
//        	'body' => 'required'
//		]);
//		or
//		$question->answers()->create( $request->only('body')+['user_id'=>$request->user()->id]);

//        $question->answers()->create(['body'=>$request->body, 'user_id'=>\Auth::id()]);
//		or
		$question->answers()->create($request->validate(['body' => 'required']) + ['user_id' => Auth::id()]);

		return back()->with('success', 'Your answer has been submitted successfully.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Answer $answer
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Question $question, Answer $answer)
	{
		$this->authorize('update', $answer);
		return view('answers.edit', compact('question', 'answer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Answer $answer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Question $question, Answer $answer)
	{
		$this->authorize('update', $answer);
		$answer->update($request->validate(['body' => 'required']));
		return redirect()->route('questions.show', $question->slug)->with('success', 'Your answer has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Answer $answer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Answer $answer)
	{
		//
	}
}
