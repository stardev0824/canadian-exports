<?php


Route::group(["prefix"=>"admin","as"=>"admin.","namespace"=>"Admin"],function (){
    Config::set('auth.defines',"admin");

    Route::get('login','AdminAuthController@get_login_form');
    Route::post("login","AdminAuthController@login")->name("login");
    Route::get("forgot/password","AdminAuthController@get_forgot_password_form");
    Route::post("forgot/password","AdminAuthController@forgot_password")->name("forgot_password");
    Route::get('reset/password/{token}','AdminAuthController@get_reset_password_form');
    Route::post('reset/password/{token}','AdminAuthController@reset_password')->name('reset_password');


    Route::group(['middleware'=>'auth:admin'],function () {
        Route::get("dashboard", function () {
            return view("admin.dashboard");
        })->name("dashboard");

        Route::resource("admins-account","AdminController");
        Route::resource("category","CategoryController");
        Route::resource("testimonial","TestimonialController");
        Route::resource("event","EventController");
        Route::resource("banners_and_sponsors","BannerAndSponsorController");
        Route::resource("ads_banner","AdsBannerController");
        Route::resource("issue","IssueController");
        Route::resource("buy","BuyController");
        Route::resource("ads","AdsController");

        Route::resource("profile","ProfileController");
        Route::get('info-letter',"InfoLetterController@index");
        Route::delete("info-letter/{id}","InfoLetterController@delete")->name("info-letter.destroy");
        Route::delete("user/{id}","AdminController@deleteUser")->name("user.destroy");
        Route::get("user","AdminController@getAllUsers")->name("user.index");


        Route::get("infos","SocialMediaController@index")->name("infos.index");
        Route::put("infos/update","SocialMediaController@update")->name("infos.update");

        Route::get("/", function () {
            return redirect(aurl("dashboard"));
        });

        Route::post("logout","AdminAuthController@logout")->name('logout');

        Route::get("comment","CommentController@index")->name("comment.index");
        Route::delete("comment/{id}","CommentController@destroy")->name("comment.destroy");

    });
});
