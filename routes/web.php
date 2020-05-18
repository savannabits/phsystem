<?php

URL::forceScheme(env('FORCE_SCHEME','https'));
URL::forceRootUrl(config('app.url'));
use Illuminate\Support\Facades\Route;
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
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});
Route::group(['middleware' => 'cas.auth'], function () {
    Auth::routes(['register' => false]);
});
Route::middleware(['auth'])->any('logout',"Auth\LoginController@logout")->name('web.logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend', 'HomeController@backend')->name('backend');



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
            Route::get('/{user}/resend-activation',                     'UsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
            Route::get('/{user}/resend-activation',                     'UsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::get('/{role}/show',                                  'RolesController@show')->name('show');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('permissions')->name('permissions/')->group(static function() {
            Route::get('/',                                             'PermissionsController@index')->name('index');
            Route::get('/create',                                       'PermissionsController@create')->name('create');
            Route::post('/',                                            'PermissionsController@store')->name('store');
            Route::get('/{permission}/edit',                            'PermissionsController@edit')->name('edit');
            Route::get('/{permission}/show',                            'PermissionsController@show')->name('show');
            Route::post('/bulk-destroy',                                'PermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{permission}',                                'PermissionsController@update')->name('update');
            Route::delete('/{permission}',                              'PermissionsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('ph-classes')->name('ph-classes/')->group(static function() {
            Route::get('/',                                             'PhClassesController@index')->name('index');
            Route::get('/create',                                       'PhClassesController@create')->name('create');
            Route::post('/',                                            'PhClassesController@store')->name('store');
            Route::get('/{phClass}/edit',                               'PhClassesController@edit')->name('edit');
            Route::get('/{phClass}/show',                               'PhClassesController@show')->name('show');
            Route::post('/bulk-destroy',                                'PhClassesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{phClass}',                                   'PhClassesController@update')->name('update');
            Route::delete('/{phClass}',                                 'PhClassesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('children')->name('children/')->group(static function() {
            Route::get('/',                                             'ChildrenController@index')->name('index');
            Route::get('/create',                                       'ChildrenController@create')->name('create');
            Route::post('/',                                            'ChildrenController@store')->name('store');
            Route::get('/{child}/edit',                                 'ChildrenController@edit')->name('edit');
            Route::get('/{child}/show',                                 'ChildrenController@show')->name('show');
            Route::post('/bulk-destroy',                                'ChildrenController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{child}',                                     'ChildrenController@update')->name('update');
            Route::delete('/{child}',                                   'ChildrenController@destroy')->name('destroy');
        });
    });
});
