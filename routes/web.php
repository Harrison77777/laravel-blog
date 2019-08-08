<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>'/'],function(){
    route::get('/', 'HomeController@index')->name('home.page');

    Route::group(['prefix'=> 'user/dashboard', 'middleware'=>'auth:web'], function(){
        route::get('/', 'UserDashboardController@index')->name('user.dashboard');
        route::resource('userPost', 'UserPostController');
    });
    
    Route::post('user/subscribe', 'SubscribeController@subscribe')->name('user.subscribe');

    Route::group(['prefix' => '/', 'middleware' => 'auth:web'], function(){
        Route::get('user-profile/view', 'UserProfileController@index')->name('user.profile.view');
        Route::get('user-profile/setting', 'UserProfileController@setting')->name('user.profile.setting');
        Route::patch('user-profile/update', 'UserProfileController@update')->name('user.profile.update');
        Route::get('user-profile/reset-password-form', 'UserProfileController@showResetPasswordForm')->name('user.profile.reset.form');
        Route::patch('user-profile/reset-password', 'UserProfileController@resetPassword')->name('user.profile.reset.password');
    });

    Route::group(['prefix' => '/', 'middleware' => 'auth:web'], function(){
        Route::post('favorite/post/add/{postId}', 'FavoritePostController@add')->name('add.favorite.post');
        Route::get('favorite/post/list', 'FavoritePostController@showFavoritePostList')->name('favorite.post.list');
        Route::post('favorite/post/{postId}', 'FavoritePostController@remove')->name('remove.favorite.post');
        Route::get('favorite/post/show/{postId}', 'FavoritePostController@show')->name('favorite.post.show');
    });

    Route::group(['prefix' => 'post'], function(){
        Route::get('details/{postSlug}', 'SinglePostController@index')->name('single.post');
    });

    Route::group(['prefix' => 'all-post'], function(){
        Route::get('/', 'AllPostController@index')->name('all.post');
    });

    Route::group(['prefix' => 'category'], function(){
        Route::get('/{categorySlug}', 'CategoryPostController@index')->name('category.post');
    });

    Route::group(['prefix' => 'tag'], function(){
        Route::get('/{tagSlug}', 'TagPostController@index')->name('tag.post');
    });
    Route::group(['prefix' => 'search'], function(){
        Route::get('/result', 'SearchController@searchResult')->name('search.post');
    });

    Route::group(['prefix'=> 'comment', 'middleware' => 'auth:web'], function(){
        Route::post('add/comment', 'CommentController@addComment');
        Route::get('show/user/post/comment', 'CommentController@index')->name('show.user.post.comment');
    });
});

Route::post('add/comment', 'CommentController@addComment');
Route::get('comment/show/{post_id}', 'SinglePostController@commentShow');

Route::group(['prefix' => 'backend', 'middleware'=> 'auth:admin', 'namespace' => 'admin'], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tag', 'TagsController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::group(['prefix'=>'user/approval'], function(){
        Route::get('/','ApprovalController@index')->name('approval.index');
        Route::patch('action/{notApprovalId}','ApprovalController@approvalAction')->name('approval.action');
        Route::get('post/check/{notApprovalId}','ApprovalController@postCheck')->name('approval.check');
        Route::delete('not-approval-post/delete/{notApprovalId}','ApprovalController@delete')->name('approval.delete');
    });
   Route::group(['prefix'=> 'subscribe'],function(){
        Route::get('/','SubscriberManageController@index')->name('subscribe.index');
        Route::delete('/{subscriberId}','SubscriberManageController@destroy')->name('subscribe.destroy');
   });
   Route::group(['prefix' => '/'], function(){
        Route::get('admin-profile/view', 'AdminProfileInfoController@index')->name('admin-profile.view');
        Route::get('admin-profile/setting', 'AdminProfileInfoController@setting')->name('admin-profile.setting');
        Route::patch('admin-profile/update', 'AdminProfileInfoController@update')->name('admin-profile.update');
        Route::get('admin-profile/reset/form', 'AdminProfileInfoController@showResetPasswordForm')->name('admin-profile.reset.password.form');
        Route::patch('admin-profile/reset/password', 'AdminProfileInfoController@resetPassword')->name('admin-profile.reset.password');
   });

});
Route::get('admin/login','Auth\admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login/attempt','Auth\admin\LoginController@login')->name('admin.login.attempt');
Route::get('admin/logout','Auth\admin\LoginController@logout')->name('admin.logout');

Route::get('frontend/token/{VerifyToken}', 'UserVerifyController@verify')->name('userVerify');

// Route::get('all-post', function () {
//     return view('frontend.home.all-post');
// });

Auth::routes();


