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
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
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
});*/

/* Auto-generated admin routes */
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});*/
Auth::routes();
Route::middleware(['auth'])->any('logout',"Auth\LoginController@logout")->name('web.logout');
Route::get('/app', 'HomeController@index')->name('home');
Route::get('/backend', 'HomeController@backend')->name('backend');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::group(["middleware" => "auth","prefix"=>"app","as" => "app."], function() {
    Route::get('classes/{slug}', "HomeController@manageClass")->name('classes.manage');
});

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


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('attendance-statuses')->name('attendance-statuses/')->group(static function() {
            Route::get('/',                                             'AttendanceStatusesController@index')->name('index');
            Route::get('/create',                                       'AttendanceStatusesController@create')->name('create');
            Route::post('/',                                            'AttendanceStatusesController@store')->name('store');
            Route::get('/{attendanceStatus}/edit',                      'AttendanceStatusesController@edit')->name('edit');
            Route::get('/{attendanceStatus}/show',                      'AttendanceStatusesController@show')->name('show');
            Route::post('/bulk-destroy',                                'AttendanceStatusesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{attendanceStatus}',                          'AttendanceStatusesController@update')->name('update');
            Route::delete('/{attendanceStatus}',                        'AttendanceStatusesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('resource-types')->name('resource-types/')->group(static function() {
            Route::get('/',                                             'ResourceTypesController@index')->name('index');
            Route::get('/create',                                       'ResourceTypesController@create')->name('create');
            Route::post('/',                                            'ResourceTypesController@store')->name('store');
            Route::get('/{resourceType}/edit',                          'ResourceTypesController@edit')->name('edit');
            Route::get('/{resourceType}/show',                          'ResourceTypesController@show')->name('show');
            Route::post('/bulk-destroy',                                'ResourceTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{resourceType}',                              'ResourceTypesController@update')->name('update');
            Route::delete('/{resourceType}',                            'ResourceTypesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('enrollments')->name('enrollments/')->group(static function() {
            Route::get('/',                                             'EnrollmentsController@index')->name('index');
            Route::get('/create',                                       'EnrollmentsController@create')->name('create');
            Route::post('/',                                            'EnrollmentsController@store')->name('store');
            Route::get('/{enrollment}/edit',                            'EnrollmentsController@edit')->name('edit');
            Route::get('/{enrollment}/show',                            'EnrollmentsController@show')->name('show');
            Route::post('/bulk-destroy',                                'EnrollmentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{enrollment}',                                'EnrollmentsController@update')->name('update');
            Route::delete('/{enrollment}',                              'EnrollmentsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('roll-calls')->name('roll-calls/')->group(static function() {
            Route::get('/',                                             'RollCallsController@index')->name('index');
            Route::get('/create',                                       'RollCallsController@create')->name('create');
            Route::post('/',                                            'RollCallsController@store')->name('store');
            Route::get('/{rollCall}/edit',                              'RollCallsController@edit')->name('edit');
            Route::get('/{rollCall}/show',                              'RollCallsController@show')->name('show');
            Route::post('/bulk-destroy',                                'RollCallsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{rollCall}',                                  'RollCallsController@update')->name('update');
            Route::delete('/{rollCall}',                                'RollCallsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('attendances')->name('attendances/')->group(static function() {
            Route::get('/',                                             'AttendancesController@index')->name('index');
            Route::get('/create',                                       'AttendancesController@create')->name('create');
            Route::post('/',                                            'AttendancesController@store')->name('store');
            Route::get('/{attendance}/edit',                            'AttendancesController@edit')->name('edit');
            Route::get('/{attendance}/show',                            'AttendancesController@show')->name('show');
            Route::post('/bulk-destroy',                                'AttendancesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{attendance}',                                'AttendancesController@update')->name('update');
            Route::delete('/{attendance}',                              'AttendancesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('lesson-resources')->name('lesson-resources/')->group(static function() {
            Route::get('/',                                             'LessonResourcesController@index')->name('index');
            Route::get('/create',                                       'LessonResourcesController@create')->name('create');
            Route::post('/',                                            'LessonResourcesController@store')->name('store');
            Route::get('/{lessonResource}/edit',                        'LessonResourcesController@edit')->name('edit');
            Route::get('/{lessonResource}/show',                        'LessonResourcesController@show')->name('show');
            Route::post('/bulk-destroy',                                'LessonResourcesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lessonResource}',                            'LessonResourcesController@update')->name('update');
            Route::delete('/{lessonResource}',                          'LessonResourcesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('general-resources')->name('general-resources/')->group(static function() {
            Route::get('/',                                             'GeneralResourcesController@index')->name('index');
            Route::get('/create',                                       'GeneralResourcesController@create')->name('create');
            Route::post('/',                                            'GeneralResourcesController@store')->name('store');
            Route::get('/{generalResource}/edit',                       'GeneralResourcesController@edit')->name('edit');
            Route::get('/{generalResource}/show',                       'GeneralResourcesController@show')->name('show');
            Route::post('/bulk-destroy',                                'GeneralResourcesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{generalResource}',                           'GeneralResourcesController@update')->name('update');
            Route::delete('/{generalResource}',                         'GeneralResourcesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('lessons')->name('lessons/')->group(static function() {
            Route::get('/',                                             'LessonsController@index')->name('index');
            Route::get('/create',                                       'LessonsController@create')->name('create');
            Route::post('/',                                            'LessonsController@store')->name('store');
            Route::get('/{lesson}/edit',                                'LessonsController@edit')->name('edit');
            Route::get('/{lesson}/show',                                'LessonsController@show')->name('show');
            Route::post('/bulk-destroy',                                'LessonsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lesson}',                                    'LessonsController@update')->name('update');
            Route::delete('/{lesson}',                                  'LessonsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('relationship-types')->name('relationship-types/')->group(static function() {
            Route::get('/',                                             'RelationshipTypesController@index')->name('index');
            Route::get('/create',                                       'RelationshipTypesController@create')->name('create');
            Route::post('/',                                            'RelationshipTypesController@store')->name('store');
            Route::get('/{relationshipType}/edit',                      'RelationshipTypesController@edit')->name('edit');
            Route::get('/{relationshipType}/show',                      'RelationshipTypesController@show')->name('show');
            Route::post('/bulk-destroy',                                'RelationshipTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{relationshipType}',                          'RelationshipTypesController@update')->name('update');
            Route::delete('/{relationshipType}',                        'RelationshipTypesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('relatives')->name('relatives/')->group(static function() {
            Route::get('/',                                             'RelativesController@index')->name('index');
            Route::get('/create',                                       'RelativesController@create')->name('create');
            Route::post('/',                                            'RelativesController@store')->name('store');
            Route::get('/{relative}/edit',                              'RelativesController@edit')->name('edit');
            Route::get('/{relative}/show',                              'RelativesController@show')->name('show');
            Route::post('/bulk-destroy',                                'RelativesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{relative}',                                  'RelativesController@update')->name('update');
            Route::delete('/{relative}',                                'RelativesController@destroy')->name('destroy');
        });
    });
});
