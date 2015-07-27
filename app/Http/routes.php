<?php

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

Route::get('/', 'BlogsController@index');
Route::get('/blogs', 'BlogsController@index');
// Route::get('users', array(
//     'as' => 'listAllUsers',
//     'uses' => 'BlogController@listAllUsers'));

// Route::get('/{username}', array(
//     'as' => 'listUserBlogs',
//     'uses' => 'BlogsController@listUserBlogs'));
Route::get('/blogs/create', 'BlogsController@createBlog');
Route::get('/blogs/{id}', 'BlogsController@show');

// /*
// /
// /    authed group
// /
// */
Route::group(array('before' => 'auth'), function () {

    /* CSRF protection group*/
    Route::group(array('before' => 'csrf'), function () {
        /*Change accout info (POST)*/
        Route::post('/account/change-account', array(
            'as' => 'change-account-post',
            'uses' => 'AccountController@postChangeAccount'));

        // // New method about blogs

        // Route::post('/{username}/new', array(
        //     'as' => 'createBlog',
        //     'uses' => 'BlogsController@createBlog'));

        Route::post('/blogs', 'BlogsController@storeBlog');

        Route::post('/blog/{id}', array(
            'as' => 'updateBlog',
            'uses' => 'BlogsController@updateBlog'));

        Route::post('/blog/{id}/delete', array(
            'as' => 'deleteBlog',
            'uses' => 'BlogsController@deleteBlog'));

        // new method about comment
        Route::post('/blog/{id}/createComment', array(
            'as' => 'createComment',
            'uses' => 'BlogsController@createComment'));

        Route::post('/blog/{comment_id}/deleteComment', array(
            'as' => 'deleteComment',
            'uses' => 'BlogsController@deleteComment'));
    });

    /*
    //Change accout info (GET)
     */
    Route::get('/account/change-account', array(
        'as' => 'account-change',
        'uses' => 'AccountController@getChangeAccount'));

    //sign out (GET)
    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'AccountController@getSignOut'));

    // // new method about blogs

    // Route::get('/{username}/new', array(
    //     'as' => 'newBlog',
    //     'uses' => 'BlogController@newBlog'));

    Route::get('/blog/{id}/edit', array(
        'as' => 'editBlog',
        'uses' => 'BlogsController@editBlog'));

    // // admin
    Route::get('/admin', array(
        'as' => 'admin',
        'uses' => 'BlogsController@listCurrentUserBlogs'));

});

/*
/
/    unauth group
/
 */
Route::group(array('before' => 'guest'), function () {

    /* CSRF protection group*/
    Route::group(array('before' => 'csrf'), function () {
        /*Create account (Post)*/
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate',
        ));

        /*Sign In (POST)*/
        Route::post('/account/signin', array(
            'as' => 'account-sign-in-post',
            'uses' => 'AccountController@postSignIn',
        ));

        //forget password (POST)
        Route::post('/account/forgot-password', array(
            'as' => 'account-forgot-password-post',
            'uses' => 'AccountController@postForgotPassword',
        ));

    });

    //forget password (GET)
    Route::get('/account/forgot-password', array(
        'as' => 'account-forgot-password',
        'uses' => 'AccountController@getForgotPassword',
    ));

    Route::get('/account/recover/{code}', array(

        'as' => 'account-recover',
        'uses' => 'AccountController@getRecover',
    ));

    /*Sign In (GET)*/
    Route::get('/account/signin', array(
        'as' => 'account-sign-in',
        'uses' => 'AccountController@getSignIn',
    ));

    /*Create account (GET)*/
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate',
    ));

    //active new user
    Route::get('/account/activate/{code}', array(

        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate',
    ));

}); //end unauth group
