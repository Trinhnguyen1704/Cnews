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

Route::pattern('id','([0-9]+)');
Route::pattern('slug','(.*)');
Route::pattern('slugStory','(.*)');
Route::pattern('slugName','(.*)');
Route::pattern('slugname','(.*)');
Route::pattern('slugUser','(.*)');


//cnews
Route::namespace('Cnews')->group(function () {

	Route::get('/', [
		'uses' => 'CnewsIndexController@index',
		'as'   => 'cnews.index.index'
	]);
	Route::get('/contact', [
		'uses' => 'CnewsContactController@index',
		'as'   => 'cnews.contact.index'
	]);
	Route::post('/contact', [
		'uses' => 'CnewsContactController@postContact',
		'as'   => 'cnews.contact.contact'
	]);
	Route::group(['prefix'=>'news' ], function(){
		Route::get('/index', [
			'uses' => 'CnewsNewsController@index',
			'as'   => 'cnews.news.index'
		]);

		Route::get('/detail/{id}-{cat_id}-{slugStory}', [
			'uses' => 'CnewsNewsController@detail',
			'as'   => 'cnews.news.detail'
		]);

		Route::get('/cat/{slug}-{id}', [
			'uses' => 'CnewsNewsController@cat',
			'as'   => 'cnews.news.cat'
		]);
	});
});
//admin
Route::get('/pass', function(){
	return bcrypt('1234');
});
Route::namespace('Auth')->group(function () {
Route::get('/login', [
			'uses' => 'AuthController@getLogin',
			'as'   => 'auth.login'
		]);

Route::post('/login', [
			'uses' => 'AuthController@postLogin',
			'as'   => 'auth.login'
		]);
Route::get('/logout', [
			'uses' => 'AuthController@Logout',
			'as'   => 'auth.logout'
		]);
});

Route::namespace('Admin')->middleware('auth')->group(function () {
	Route::group(['prefix'=>'admin' ], function(){
		//user
		Route::get('/user', [
			'uses' => 'UserController@index',
			'as'   => 'admin.user.index'
		]);

		Route::get('/user/edit/{id}-{slugUser}', [
			'uses' => 'UserController@getEdit',
			'as'   => 'admin.user.edit'
		]);
		Route::post('/user/edit/{id}-{slugUser}', [
			'uses' => 'UserController@postEdit',
			'as'   => 'admin.user.edit'
		]);
		Route::get('/user/del/{id}', [
			'uses' => 'UserController@delete',
			'as'   => 'admin.user.del'
		]);
		Route::post('/user/add', [
			'uses' => 'UserController@postAdd',
			'as'   => 'admin.user.add'
		]);
		Route::get('/user/add', [
			'uses' => 'UserController@getAdd',
			'as'   => 'admin.user.add'
		])->middleware('anewsauth:admin|admindemo');
		Route::match(['get','post'],'/user/search', [
			'uses' => 'UserController@search',
			'as'   => 'admin.user.search'
		]);
		//story
		Route::get('/story', [
			'uses' => 'StoryController@index',
			'as'   => 'admin.story.index'
		]);

		Route::get('/story/edit/{id}-{slugName}', [
			'uses' => 'StoryController@getEdit',
			'as'   => 'admin.story.edit'
		]);
		Route::post('/story/edit/{id}-{slugName}', [
			'uses' => 'StoryController@postEdit',
			'as'   => 'admin.story.edit'
		]);
		Route::post('/story/add', [
			'uses' => 'StoryController@postAdd',
			'as'   => 'admin.story.add'
		]);
		Route::get('/story/add', [
			'uses' => 'StoryController@getAdd',
			'as'   => 'admin.story.add'
		]);

		Route::get('/story/del/{id}', [
			'uses' => 'StoryController@delete',
			'as'   => 'admin.story.del'
		]);
		Route::match(['get','post'],'/story/search', [
			'uses' => 'StoryController@search',
			'as'   => 'admin.story.search'
		]);
		/*Route::get('/story/search', [
			'uses' => 'StoryController@index',
			'as'   => 'admin.story.search'
		]);*/
		
		
		
		//cat
		Route::get('/cat', [
			'uses' => 'CatController@index',
			'as'   => 'admin.cat.index'
		]);
		Route::get('/cat/edit/{id}-{slugCat}', [
			'uses' => 'CatController@getEdit',
			'as'   => 'admin.cat.edit'
		]);
		Route::post('/cat/edit/{id}-{slugCat}', [
			'uses' => 'CatController@postEdit',
			'as'   => 'admin.cat.edit'
		]);
		Route::post('/cat/add', [
			'uses' => 'CatController@postAdd',
			'as'   => 'admin.cat.add'
		]);
		Route::get('/cat/add', [
			'uses' => 'CatController@getAdd',
			'as'   => 'admin.cat.add'
		]);
		Route::get('/cat/del/{id}', [
			'uses' => 'CatController@delete',
			'as'   => 'admin.cat.del'
		]);
		//contact
		Route::get('/contact', [
			'uses' => 'ContactController@index',
			'as'   => 'admin.contact.index'
		]);
	});
});

//controller có biến >> route có biến



