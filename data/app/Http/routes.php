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
use App\Author;
use App\Book;
use App\Categories;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UsersController@getdangnhapAdmin');
Route::post('admin/dangnhap','UsersController@postdangnhapAdmin')->name('postloginAdmin');
Route::get('admin/logout', 'UsersController@getlogoutAdmin')->name('getlogoutAdmin');
Route::post('/dangnhap','UsersController@postdangnhapUser')->name('postdangnhapUser');

Route::group(['prefix' => 'admin','middleware' => 'adminLogin'],function(){
	Route::get('',['as' => 'admin', 'uses' => 'Controller@getAdminHome']);
    
	Route::group(['prefix' => 'users'], function(){
		Route::get('',['as' => 'users','uses' => 'UsersController@getDanhsach']);
		Route::get('addusers', ['as' => 'addusers','uses' => 'UsersController@addUsers']);
		Route::get('listusers', ['as' => 'listusers','uses' => 'UsersController@getDanhsach']);
        Route::post('postaddUser', ['as' => 'postaddUser', 'uses' => 'UsersController@postaddUser']);
        Route::get('getedituser/{id}','UsersController@geteditUser');
        Route::post('postedituser/{id}', 'UsersController@posteditUser');
        Route::get('getdeleteuser/{id}', 'UsersController@getdeleteUser');
        Route::post('postbanneduser/{id}','UsersController@postbannedUser');
        Route::get('getbannedlist', 'BannedController@getbannedList')->name('listbanned');
        Route::post('postunbanned/{id}','BannedController@postunbanned');
	});
	Route::group(['prefix' => 'categories'], function(){
		Route::get('',['as' => 'categories','uses' => 'CategoriesController@getDanhsach']);
		Route::get('listcat', ['as' => 'listcat','uses' => 'CategoriesController@getDanhsach']);
		Route::get('addcat', ['as' => 'addcat','uses' => 'CategoriesController@addCat']);
		Route::post('postaddcat', ['as' => 'postaddcat','uses' => 'CategoriesController@postaddCat']);
		Route::get('geteditcat/{id}', 'CategoriesController@geteditCat')->name('geteditcat');
		Route::post('posteditcat/{id}','CategoriesController@posteditCat')->name('posteditcat');
		Route::get('getdeletecat/{id}', 'CategoriesController@getdeletecat')->name('getdeletecat');
	});
	Route::group(['prefix' => 'books'], function(){
		Route::get('',['as' => 'books','uses' => 'BooksController@listBook']);
		Route::get('addbook', ['as' => 'addbook','uses' => 'BooksController@addBook']);
		Route::post('postaddBook',['as' => 'postaddBook', 'uses' => 'BooksController@postaddBook']);
		Route::get('geteditbook/{id}', ['as' => 'geteditbook', 'uses' => 'BooksController@geteditbook']);
		Route::post('posteditbook/{id}', ['as' => 'posteditbook', 'uses' => 'BooksController@posteditbook']);
		Route::get('getdeletebook/{id}', ['as' => 'getdeletebook', 'uses' => 'BooksController@getdeletebook']);
	});
	Route::group(['prefix' => 'comments'], function(){
		Route::get('',['as' => 'comments', 'uses' => 'CommentController@listComment']);
        Route::get('xoacomment/{id}/{bookid}',"CommentController@getXoacomment");
        Route::get('getdeletecomment/{id}','CommentController@getdeleteComment');
	});
	Route::group(['prefix' => 'authors'], function(){
		Route::get('',['as' => 'authors', 'uses' => 'AuthorController@listAuthor']);
		Route::get('listauthor',['as' => 'listauthor', 'uses' => 'AuthorController@listAuthor']);
		Route::get('addauthor',['as' => 'addauthor', 'uses' => 'AuthorController@addAuthor']);
		Route::post('postaddAuthor',['as' => 'postaddAuthor', 'uses' => 'AuthorController@postaddAuthor']);
        Route::get('geteditauthor/{id}','AuthorController@geteditauthor')->name('geteditauthor');
        Route::post('posteditauthor/{id}', 'AuthorController@posteditauthor')->name('posteditauthor');
        Route::get('getdeleteauthor/{id}', 'AuthorController@getdeleteauthor')->name('getdeleteauthor');
	});
	Route::group(['prefix' => 'permissions'], function(){
		Route::get('',['as' => 'permissions', 'uses' => "PermissionController@listPermission"]);
        Route::get('getaddpermission','PermissionController@getaddPermission');
        Route::post('postaddpermission','PermissionController@postaddPermission');
        Route::get('geteditpermission/{id}','PermissionController@geteditPermission');
        Route::post('posteditpermission/{id}','PermissionController@posteditPermission');
	});
    Route::group(['prefix' => 'publisher'], function(){
		Route::get('',['as' => 'publisher', 'uses' => "PublisherController@listPublisher"]);
        Route::get('getaddpublisher','PublisherController@getaddPublisher');
        Route::post('postaddpublisher','PublisherController@postaddPublisher');
        Route::get('geteditpublisher/{id}','PublisherController@geteditPublisher');
        Route::post('posteditpublisher/{id}','PublisherController@posteditPublisher');
        Route::get('getdeletepublisher/{id}','PublisherController@getdeletePublisher');
	});
});

Route::get('/signin','Controller@rejectPage')->name('signin')->middleware('checkLogin:class');
Route::group(['prefix' => ''],function(){
    Route::get('','Controller@getHome')->name('home');
    Route::get('/bookread/{id}','BooksController@readBook');
    
    Route::get('/logout', 'UsersController@getlogoutUser')->name('getlogoutUser');    
});

Route::group(['prefix' => 'book'],function(){
    Route::get('/view/{id}','BooksController@viewinfoBook');
    Route::post('/comment/{id}','CommentController@postComment');
});
Route::group(['prefix' => 'ajax'],function(){
    Route::get('getvoice/{id}', 'AjaxController@getVoice');
    Route::get('getvoicecomment/{id}', 'AjaxController@getVoiceComment');
});

Route::group(['prefix' => 'author'],function(){
    Route::get('view/{id}', 'AuthorController@getInfoAuthor');
});


Route::get('voice',function(){
    return view('voice');
});

Route::get('test', function(){
	$author = Author::find(2);
	foreach($author->book as $book){
		echo $book->id.". ".$book->book_name." <br>";
	}
});
Route::get('test1',function(){
	$cat = Categories::all();
	foreach($cat->books as $book){
		echo $book->id.". ".$book->book_name." <br>";
	}
});

Route::get('test2', function(){
	$book = Book::find(2);
	return $book->categories->cat_name;
});