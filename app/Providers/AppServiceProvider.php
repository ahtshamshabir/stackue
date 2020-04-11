<?php

namespace App\Providers;

use App\Question;
use App\Policies\QuestionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected $policies = [
//    	Question::class => QuestionPolicy::class,
	];
    public function boot()
    {
//    	$this->registerPolicies();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	//
    }
}
