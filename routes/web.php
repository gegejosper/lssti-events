<?php

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
Route::get('/apply', 'FrontController@apply');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('/applications', 'AdminController@applications')->name('applications');
        Route::get('/applications/new', 'AdminController@new_application')->name('new_application');
        Route::get('/employees', 'AdminController@employees')->name('employees');
        Route::get('/packages', 'AdminController@packages')->name('packages');
        Route::get('/plans', 'AdminController@plans')->name('plans');
        Route::post('/plans/add', 'PlansController@plans_add')->name('plans_add');
        Route::post('/plans/update', 'PlansController@plans_update')->name('plans_update');
        Route::post('/plans/modify', 'PlansController@plans_modify')->name('plans_modify');
        Route::post('/packages/add', 'PackagesController@packages_add')->name('packages_add');
        Route::post('/packages/update', 'PackagesController@packages_update')->name('packages_update');
        Route::post('/packages/modify', 'PackagesController@packages_modify')->name('packages_modify');
        Route::post('/employees/add', 'EmployeesController@employees_add')->name('employees_add');
        Route::post('/employees/update', 'EmployeesController@employees_update')->name('employees_update');
        Route::post('/employees/modify', 'EmployeesController@employees_modify')->name('employees_modify');
        Route::get('/products', 'AdminController@products')->name('products');
        Route::get('/settings', 'AdminController@settings')->name('settings');
        Route::post('/settings/update', 'SettingController@save_settings')->name('save_settings');
        Route::get('/subscribers', 'AdminController@subscribers')->name('subscribers');
        Route::get('/users', 'AdminController@users')->name('subscribers');
        Route::get('/users/{user_id}', 'UserController@edit_user')->name('edit_user');  
        Route::post('/users/update', 'UserController@update_user')->name('update_user');  
        Route::post('/users/modify', 'UserController@modify_user')->name('modify_user');  
        Route::post('/users/add', 'UserController@add_user')->name('add_user');  
    });
});

Route::middleware('can:manage-subscriber')->namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::get('/', 'SubscribersController@dashboard')->name('dashboard');
    Route::prefix('subscriber')->name('subscriber.')->group(function() {
        Route::get('/bills', 'SubscribersController@bills')->name('bills');
        Route::get('/payments', 'SubscribersController@payments')->name('payments');
    });
});
Route::namespace('Panel')->prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-finance')->prefix('finance')->name('finance.')->group(function() {
        Route::get('/', 'FinanceController@dashboard')->name('dashboard');
        Route::get('/payments', 'FinanceController@payments')->name('payments');
        Route::get('/bills', 'FinanceController@bills')->name('bills');
    });
});


require __DIR__.'/auth.php';
