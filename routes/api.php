<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


//Menu routes
Route::get('menu', 'MenuController@index');
Route::get('menu/{menu}', 'MenuController@show');
Route::post('menus', 'MenuController@store');
Route::put('menus/{menus}', 'MenuController@update');
Route::delete('menus/{menus}', 'MenuController@destroy');
Route::get('showFullMenu', 'MenuController@showFullMenu');


//Menu Item routes
Route::get('menuItem', 'MenuItemController@index');
Route::get('menuItem/{menuItem}', 'MenuItemController@show');
Route::post('menuItems', 'MenuItemController@store');
Route::put('menuItems/{menuItems}', 'MenuItemController@update');
Route::delete('menuItems/{menuItems}', 'MenuItemController@destroy');

//League routes
Route::get('league', 'LeagueController@index');
Route::get('league/{league}', 'LeagueController@show');
Route::post('leagues', 'LeagueController@store');
Route::put('leagues/{leagues}', 'LeagueController@update');
Route::delete('leagues/{leagues}', 'LeagueController@destroy');
Route::get('topLeagues', 'LeagueController@topLeagues');
Route::get('completeLeagues', 'LeagueController@showCompleteLeagues');


//Team routes
Route::get('team', 'TeamController@index');
Route::get('team/{team}', 'TeamController@show');
Route::post('teams', 'TeamController@store');
Route::put('teams/{teams}', 'TeamController@update');
Route::delete('teams/{teams}', 'TeamController@destroy');
Route::get('topTeams', 'TeamController@top10Teams');




