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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
Route::post('/contacts',['uses' => 'ContactsController@addRequest',
    'as' => 'contacts',
]);


Route::get('/profile/{id}', 'UsersController@edit')->name('users.edit')->where('id','\d+');
Route::post('/profile/{name}', 'UsersController@editRequest')->name('users.edit')->middleware('can:view,user');
Route::patch('/profile/{name}', 'UsersController@editRequest')->name('users.edit')->middleware('can:view,user');


Route::get('/adm', function () {
    return view('adm');
})->name('adm');

Route::get('/invite', function () {
    return view('invite');
})->name('invite');

Route::get('/own', function () {
    return view('own');
})->name('own');

Route::get('/docs', function () {
    return view('docs');
})->name('docs');

Route::get('/blog',['uses' => 'PostsShowController@index',
    'as' => 'blog',
]);
Route::get('/post/{id}/{slug}.html',['uses' => 'PostsShowController@showPost',
    'as' => 'blog.show',
])->where('id','\d');
Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
		return view('auth.register');
	});
	Route::post('/register', function () {
		return view('auth.register');
	});
    Route::post('/passwords/email', function () {
        return view('auth.password.email');
    });
    Route::get('/passwords/reset', function () {
        return view('auth.password.reset');
    });
    Route::post('/passwords/reset', function () {
        return view('auth.password.reset');
    });
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    /**Categories*/

    Route::get('/categories/index',['uses' => 'CategoriesController@index',
        'as' => 'categories', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/categories/add',[ 'uses' => 'CategoriesController@add',
        'as' => 'add', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::post('/categories/add',['uses' => 'CategoriesController@addRequest',
        'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/categories/edit/{id}',['uses' => 'CategoriesController@edit',
        'as' => 'categories.edit', 'middleware' => 'roles', 'roles' => ['admin']
    ])->where('id','\d+');
    Route::post('/categories/edit/{id}',['uses' => 'CategoriesController@editRequest',
        'middleware' => 'roles', 'roles' => ['admin']])->where('id','\d+');
    Route::delete('/categories/delete',['uses' => 'CategoriesController@delete',
        'as' => 'categories.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);

    /**Posts*/

    Route::get('/posts/index',['uses' => 'PostsController@index',
        'as' => 'posts', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/posts/add',[ 'uses' => 'PostsController@add',
        'as' => 'add', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::post('/posts/add',['uses' => 'PostsController@addRequest',
        'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/posts/edit/{id}',['uses' => 'PostsController@edit',
        'as' => 'posts.edit', 'middleware' => 'roles', 'roles' => ['admin']
    ])->where('id','\d+');
    Route::post('/posts/edit/{id}',['uses' => 'PostsController@editRequest',
        'middleware' => 'roles', 'roles' => ['admin']])->where('id','\d+');
    Route::delete('/posts/delete',['uses' => 'PostsController@delete',
        'as' => 'posts.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);

    /**Timetables*/

    Route::get('/timetable/index',['uses' => 'TimetableController@index',
        'as' => 'timetable', 'middleware' => 'roles', 'roles' => ['admin','teacher','student']
    ]);
    Route::get('/timetable/add',[ 'uses' => 'TimetableController@add',
        'as' => 'timetable.add', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::post('/timetable/add',['uses' => 'TimetableController@addRequest',
        'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/timetable/edit/{id}',['uses' => 'TimetableController@edit',
        'as' => 'timetable.edit', 'middleware' => 'roles', 'roles' => ['admin']
    ])->where('id','\d+');
    Route::post('/timetable/edit/{id}',['uses' => 'TimetableController@editRequest',
        'middleware' => 'roles', 'roles' => ['admin']])->where('id','\d+');
    Route::delete('/timetable/delete',['uses' => 'TimetableController@delete',
        'as' => 'timetable.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);

    /**Users*/

    Route::get('/users/index',['uses' => 'UsersController@index',
        'as' => 'users', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::post('/users/index/{id}',['uses' => 'UsersController@changeRole',
        'as' => 'users.changeR',
        'middleware' => 'roles', 'roles' => ['admin']])->where('id','\d+');
    Route::delete('/users/delete',['uses' => 'UsersController@delete',
        'as' => 'users.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);

    /**Comments*/
    Route::post('/comments/add',['uses' => 'CommentsShowController@addComment',
        'as' => 'comments.add',
    ]);
    Route::get('/comments/index',['uses' => 'CommentsController@index',
        'as' => 'comments', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::get('/comments/accept/{id}',['uses' => 'CommentsController@acceptComment',
        'as' => 'comments.accept', 'middleware' => 'roles', 'roles' => ['admin']
    ])->where('id','\d+');
    Route::delete('/comments/delete',['uses' => 'CommentsController@delete',
        'as' => 'comments.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);

    /**Backcalls*/
    Route::get('/contacts/index',['uses' => 'ContactsController@index',
        'as' => 'contacts.index', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
    Route::delete('/contacts/delete',['uses' => 'ContactsController@delete',
        'as' => 'contacts.delete', 'middleware' => 'roles', 'roles' => ['admin']
    ]);
});
/*Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');*/
