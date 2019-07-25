<?php


//Route::get('/home', 'HomeController@index')->name('home');

//Route::Auth();

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'login', 'middleware' => 'guest.admin'], function () {

        Route::get('/', 'authController@index')->name('admin.login');

        Route::post('/', 'authController@adminLogin')->name('admin.login.store');

    });

});
Route::get('/logout', 'authController@logout')->name('admin.logout');

//'namespace'=> 'Admin'

Route::group(['prefix' => 'admin' , 'middleware' => 'auth.admin'], function () {


  //  Route::get('/logout', 'authController@logout')->name('admin.logout');

    Route::get('/home', 'Admin\homeController@index')->name('admin.home');

    Route::get('/', 'Admin\adminController@index')->name('admin.index');

    Route::get('/create', 'Admin\adminController@create')->name('admin.create');

    Route::post('/store', 'Admin\adminController@store')->name('admin.store');

    Route::get('/{id}/edit', 'Admin\adminController@edit')->name('admin.edit');

    Route::put('/{id}/update', 'Admin\adminController@update')->name('admin.update');

    Route::delete('/{id}/destroy', 'Admin\adminController@destroy')->name('admin.destroy');

    Route::get('/notifications', 'Admin\notificationController@index')->name('notifications.index');


    Route::group(['prefix' => 'users'], function () {

       Route::get('/', 'Admin\userController@index')->name('users.index');

       Route::get('/create', 'Admin\userController@create')->name('user.create');

       Route::post('/store', 'Admin\userController@store')->name('user.store');

       Route::get('/{id}/edit', 'Admin\userController@edit')->name('user.edit');

       Route::patch('/{id}/update', 'Admin\userController@update')->name('user.update');

       Route::delete('/{id}/destroy', 'Admin\userController@destroy')->name('user.destroy');

    });


    Route::group(['prefix' => 'orders'], function () {

        Route::get('/', 'Admin\orderController@index')->name('orders.index');

        Route::get('/create', 'Admin\orderController@create')->name('order.create');

        Route::post('/store', 'Admin\orderController@store')->name('order.store');

        Route::get('/{id}/edit', 'Admin\orderController@edit')->name('order.edit');

       Route::patch('/{id}/update', 'Admin\orderController@update')->name('order.update');

       Route::delete('/{id}/destroy', 'Admin\orderController@destroy')->name('order.destroy');

    });


    Route::group(['prefix' => 'products'], function () {

        Route::get('/', 'Admin\ProductsController@index')->name('products.index');

        Route::get('/create', 'Admin\ProductsController@create')->name('product.create');

        Route::patch('/{id}/updatetopadd', 'Admin\ProductsController@updateTopAdd')->name('product.updatetopadd');

        Route::post('/store', 'Admin\ProductsController@store')->name('product.store');

        Route::get('/{id}/edit', 'Admin\ProductsController@edit')->name('product.edit');

        Route::put('/{id}/update', 'Admin\ProductsController@update')->name('product.update');

        Route::delete('/{id}/destroy','Admin\ProductsController@destroy')->name('product.destroy');

    });

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', 'Admin\categoriesController@index')->name('categories.index');

        Route::post('/store', 'Admin\categoriesController@store')->name('category.store');

        Route::get('/{id}/edit', 'Admin\categoriesController@edit')->name('category.edit');

        Route::put('/{id}/update', 'Admin\categoriesController@update')->name('category.update');

        Route::delete('/{id}/destroy', 'Admin\categoriesController@destroy')->name('category.destroy');
    });

    Route::group(['prefix' => 'offers'], function () {

        Route::get('/', 'Admin\offersController@index')->name('offers.index');

        Route::get('/create', 'Admin\offersController@create')->name('offer.create');

        Route::post('/store', 'Admin\offersController@store')->name('offer.store');

        Route::get('/{id}/edit', 'Admin\offersController@edit')->name('offer.edit');

        Route::patch('/{id}/update', 'Admin\offersController@update')->name('offer.update');

        Route::delete('/{id}/destroy', 'Admin\offersController@destroy')->name('offer.destroy');
    });

    Route::group(['prefix' => 'packages'], function () {

        Route::get('/', 'Admin\packageController@index')->name('packages.index');

        Route::get('/create', 'Admin\packageController@create')->name('package.create');

        Route::post('/store', 'Admin\packageController@store')->name('package.store');

        Route::get('/{id}/edit', 'Admin\packageController@edit')->name('package.edit');

        Route::patch('/{id}/update', 'Admin\packageController@update')->name('package.update');

        Route::delete('/{id}/destroy', 'Admin\packageController@destroy')->name('package.destroy');
    });

    Route::group(['prefix' => 'sponsors'], function () {

        Route::get('/', 'Admin\sponsorController@index')->name('sponsers.index');

        Route::get('/create', 'Admin\sponsorController@create')->name('sponser.create');

        Route::post('/store', 'Admin\sponsorController@store')->name('sponser.store');

        Route::get('/{id}/edit', 'Admin\sponsorController@edit')->name('sponser.edit');

        Route::patch('/{id}/update', 'Admin\sponsorController@update')->name('sponser.update');

        Route::delete('/{id}/destroy', 'Admin\sponsorController@destroy')->name('sponser.destroy');
    });

});



/////////////////////////////////////////APIs

Route::group(['prefix' => 'api'], function () {

    Route::post('/register', 'ApiRegisterController@register');

    Route::post('/login', 'ApiLoginController@login');

    Route::post('/checkpassword', 'forgetPasswordApiController@checkPassword')->name('user.check');

    Route::post('/verifycode', 'forgetPasswordApiController@verifyCode')->name('user.verify');

    Route::post('/resetPassword', 'forgetPasswordApiController@resetPassword')->name('user.reset');


    ////////////////////////////////APIs WITH AUTHENTICATION

    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('/shops', 'User\shopApicontroller@index')->name('shop.index');
        ///////////////////////////////////////////home

        Route::group(['prefix' => 'home'], function () {

            Route::get('/', 'User\homeApicontroller@index')->name('home.index');

            Route::get('/{offer}/offerproducts', 'User\homeApicontroller@offerproducts')->name('offer.products');

            Route::get('/{product}/product', 'User\homeApicontroller@show')->name('product.show');


        });


        ///////////////////////////////////////////Offers,Offer Product details,Offer reservetion

        Route::group(['prefix' => 'offers'], function () {

            Route::get('/', 'User\offersApicontroller@index')->name('offers.home');

           // Route::get('{id}/show', 'User\offersApicontroller@show')->name('offer.show');

            Route::post('{id}/reserve', 'User\offersApicontroller@reserveProduct')->name('offer.reserve');

        });


        //////////////////////////////////////////USER PROFILE

        Route::group(['prefix' => 'profile'], function () {

            Route::post('{user}/edit', 'User\profileApiController@updateProfile')->name('profile.edit');

            Route::post('/complaint','User\profileApiController@storeComplaint')->name('complaint.store');

            Route::get('/reservations','User\profileApiController@reservations')->name('user.reservations');

            Route::get('/favorites','User\profileApiController@favoriteProducts')->name('user.favorites');

        });


    });

});


















