<?php

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 *	Models are bson encoded objects (mongoDB)
 */

Route::model('users', 'User');
Route::model('courses', 'Course');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'api'), function(){

    /**
     * Password reset flow:
     * 1. /forget : user request for a reset token, a link will be sent by email
     * 2. /reset/key : link on the email redirects to the form on the mobile app
     * 3. /reset : form on the mobile app defines the new password
     */
    
    Route::get('users/reset/{key}', function($key){
        return ApiResponse::toApplication('reset/'.$key);
    });
    
    Route::post('users/forgot', array('as' => 'api.users.forgot', 'uses' => 'UserController@forgot'));

    Route::post('users/reset', array('as' => 'api.users.reset', 'uses' => 'UserController@resetPassword'));
    
    Route::post('users/auth', array('as' => 'api.users.auth', 'uses' => 'UserController@authenticate'));
    
    Route::post('users/auth/facebook', array('as' => 'api.users.auth.facebook', 'uses' => 'UserController@authenticateFacebook'));

    Route::resource('users', 'UserController', array('only' => array('index', 'store')));

    Route::resource('courses', 'CourseController', array('only' => array('index')));

    //	User needs to have a registered and active token
    Route::group(array('before' => 'logged_in'), function() {

        Route::get('users/sessions', array('as' => 'api.users.sessions', 'uses' => 'UserController@sessions'));

        Route::group(array('prefix' => 'users/{users}'), function() {

            Route::get('show', array('as' => 'api.users.show', 'uses' => 'UserController@show'));
            Route::post('logout', array('as' => 'api.users.logout', 'uses' => 'UserController@logout'));

        });
    });   
});