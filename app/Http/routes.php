<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ListController@show');

Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

Route::get('/auth0/login', function() {
        $domain = env('AUTH0_DOMAIN');
        $clientId = env('AUTH0_CLIENT_ID');
        $redirectUri = env('AUTH0_CALLBACK_URL');
        $authorizeUrl = sprintf(
            'https://%s/authorize?scope=openid&client_id=%s&response_type=code&redirect_uri=%s',
            $domain,
            $clientId,
            $redirectUri);
        return redirect($authorizeUrl);
    });

Route::get('/logout', function () {
   Auth::logout();

   return redirect('/');
});

Route::auth();

Route::get('/got', [
  'middleware' => ['auth'],
  'uses' => function () {
   echo "You are allowed to view this page!";
}]);

Route::get('/home', 'HomeController@index');
