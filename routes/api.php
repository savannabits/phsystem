<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
URL::forceScheme(env('FORCE_SCHEME','https'));
URL::forceRootUrl(config('app.url'));
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => "auth:sanctum,api", "namespace" =>"Api", "as" =>"api."], function () {
    /**
     * ROLE
     */
    Route::group(['as' => "roles.","prefix" => "roles"], function () {
        Route::get("", "RoleController@index")->name("index");
        Route::get("{role}", "RoleController@get")->name('get');
        Route::get("{role}/permissions","RoleController@permissions")->name('permissions');
        Route::post("{role}/permissions/toggle", "RoleController@togglePermission")->name("permissions.toggle");
        Route::post("{role}/permissions/toggle-all", "RoleController@toggleAllPermissions")->name("permissions.toggle-all");
    });

    Route::group(["prefix" => "profile", "as" => "profile."],function() {
        Route::get('', "ProfileController@show")->name('show');
        Route::post("avatar","ProfileController@uploadAvatar")->name('avatar.upload');
        Route::put('',"ProfileController@update")->name('update');
        Route::put('password',"ProfileController@changePassword")->name('change-password');
    });

    Route::apiResource("children", "ChildController");
    Route::group(["prefix" => "children", "as" => "children."],function() {
        Route::post("{child}/avatar","ChildController@uploadAvatar")->name('avatar.upload');
    });


    Route::apiResource("users", "UserController");
    Route::apiResource("relationship-types", "RelationshipTypeController");
    Route::apiResource("attendance-statuses", "AttendanceStatusController");
    Route::apiResource("relatives","RelativeController");
    Route::apiResource("roll-calls","RollCallController");
    Route::apiResource("ph-classes", "PhClassController");
    Route::group(["prefix" => "ph-classes", "as" => "ph-classes."],function() {
        Route::get("{ph_class}/roll-calls","PhClassController@rollCalls")->name('roll-calls');
        Route::get("{ph_class}/current-enrollments","PhClassController@getCurrentChildren")->name('current-children');
    });
    Route::apiResource("attendances","AttendanceController");
});
