<?php

Route::filter('user', function(){
    if(!Auth::check()){
        return View::make('errors.403');
    }
});


Route::get('/', function()
{
	if(!Auth::check()){
        return Redirect::route('login');
    }

    $user = Auth::user();

    return ($user);
});

Route::get('/message', ['before'=>'user', function() {
    // List of threads, linking to message/thread id
    $threads = Message::orWhere(function($query){
        $query
            ->where('user_id', Auth::id())
            ->where('to_user_id', Auth::id());
        })
        ->groupBy('thread_id')
        ->orderBy('created_at', 'DESC')
        ->get();

    $user_list = [''=>'Please select'] + User::where('id', '!=', Auth::id())->lists('email', 'id');

    return View::make('message.index', compact('threads', 'user_list'));
}]);

Route::get('/message/{threadId}', function($threadId) {
    $thread = Message::where('thread_id', $threadId)->orderBy('created_at', 'DESC')->with('user')->get();

    return View::make('message.thread', compact('thread', 'threadId'));
});

Route::post('/message', ['as'=>'message', function() {
    $message = new Message;
    $message->body = Input::get('body');
    $message->thread_id = Input::get('threadId') ?: microtime(true) * 10000;
    $message->user_id = Auth::id();
    $message->to_user_id = Input::get('toUserId');
    $message->save();
// dd(Input::get('threadId') ?: microtime(true) * 10000);
    return Redirect::back();

}]);

Route::get('/login', ['as'=>'login', function() {
    return View::make('user/login');
}]);

Route::post('/login', ['as'=>'login', function() {
    if(Auth::attempt([
        'email'=>Input::get('email'),
        'password'=>Input::get('password'),
    ], true)){
        return Redirect::intended('message');
    }

    return Redirect::route('login')->withInput(Input::except('password'))->withErrors([
        'email' => 'Invalid email or password',
    ]);
}]);

Route::get('/logout', ['as'=>'logout', function() {
    Auth::logout();
    return Redirect::to('/');
}]);

View::composer('layouts.master', function($view) {
    $unread = Message::where('to_user_id', Auth::id())->groupBy('thread_id')->count();
    $view->with('unread', $unread);
});