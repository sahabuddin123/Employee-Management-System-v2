<?php
Auth::routes();
Route::group(['prefix'  =>  'admin'], function () {
 
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
 
    Route::group(['middleware' => ['auth:admin']], function () {
 
        Route::get('/', function () {
            $fatch = DB::select(' SELECT COUNT(id) FROM departments');
            
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
 
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

/**********
         * Department Controller
         * ******** */
        Route::group(['prefix'  =>   'adminuser'], function() {
 
            Route::get('/', 'Admin\AdminsController@index')->name('admin.adminuser.index');
            Route::get('/create', 'Admin\AdminsController@create')->name('admin.adminuser.create');
            Route::post('/store', 'Admin\AdminsController@store')->name('admin.adminuser.store');
            Route::get('/{id}/edit', 'Admin\AdminsController@edit')->name('admin.adminuser.edit');
            Route::post('/update', 'Admin\AdminsController@update')->name('admin.adminuser.update');
            Route::get('/{id}/delete', 'Admin\AdminsController@delete')->name('admin.adminuser.delete');
         
        });

        /**********
         * Department Controller
         * ******** */
        Route::group(['prefix'  =>   'departments'], function() {
 
            Route::get('/', 'Admin\DepartmentController@index')->name('admin.departments.index');
            Route::get('/create', 'Admin\DepartmentController@create')->name('admin.departments.create');
            Route::post('/store', 'Admin\DepartmentController@store')->name('admin.departments.store');
            Route::get('/{id}/edit', 'Admin\DepartmentController@edit')->name('admin.departments.edit');
            Route::post('/update', 'Admin\DepartmentController@update')->name('admin.departments.update');
            Route::get('/{id}/delete', 'Admin\DepartmentController@delete')->name('admin.departments.delete');
         
        });
    });
});