<?php

Route::get('/route-cache-clear', function() {
//    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    dd("route cache clear");
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-mail', function () {
    $user = \App\User::find(197);
    $profile = $user->profile();
    if($user->approved == "0") {
        $to = env('ADMIN_MAIL');
        echo $to;
        $from = $user->email;

        $categories = $profile->categories->toArray();
        $categoryList = [];
        foreach($categories as $one) 
            array_push($categoryList, "\"".$one['name_en']."\"");
        $categoryList = implode(", ", $categoryList);

        $companyName = $profile->company_name;
        $package = $user->package_description;
        $token = hash('sha256', Str::random(60));
        $user->update(['approved'=> $token]);
        
        $data = ['to'=>$to, 'from'=>$from, 'companyName'=>$companyName, 'categoryList'=>$categoryList, 'package'=>$package, 'token'=>$token];
        Mail::send("mails.reg_to_admin", compact("data"), function($message) use ($data) {
                $message->to($data['to'])
                        ->from($data['from'])
                        ->subject("Canadian Exports: New user registration");
            });
    }
    // $to = "kapilpal3766@gmail.com";
    // $subject = "My subject";
    // $txt = "Hello world!";
    // $headers = "From: admin@canadianexports.org\r\n";
    
    // mail($to,$subject,$txt,$headers);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/social-media', 'HomeController@social_media')->name('user.social-media');
Route::get('/media', 'HomeController@media')->name('user.media');
Route::view('/account-settings',"account-settings");
Route::post("/update-account","HomeController@update_account")->name("user.update-account");


Route::put('/home', 'HomeController@profile_update')->name('home.profile.update');
Route::put('/social-media', 'HomeController@social_media_update')->name('home.social-media.update');
Route::put('/media', 'HomeController@media_update')->name('home.media.update');


Route::post('/company-contact/{company_email}', 'NavigationController@company_contact')->name('company-contact');


Route::post("info-letter","NavigationController@infoLetter")->name("info-letter");
Route::get("page/{page}","NavigationController@getView");
Route::post("page/{page}","NavigationController@getView");
Route::get("/lang/{lang}","NavigationController@change_lang");
Route::post("register-review","NavigationController@registerreview")->name("user.registerreview");
Route::post("register-user","NavigationController@register")->name("user.register");
Route::delete("register_back/{id}","NavigationController@register_back")->name("register.back");
Route::post("register-revive","PaymentController@create")->name("user.register-revive");
Route::post("contact","ContactController@contact")->name("contact-us");

Route::get("category/{slug}","NavigationController@getCategoryBySlug");

Route::get("profile/{id}","NavigationController@getProfile");



Route::get("event/{id}","NavigationController@getEvent");
Route::view("inquiries-to-bay","inquiries-to-bay");

Route::post("comment","NavigationController@sendAndStoreComment")->name("comment");
Route::post("inquire-mail","NavigationController@inquire_send")->name("inquire-mail");




//**********************paypal payment route ****************************/
Route::post("create-payment","PaymentController@create")->name("create-payment");
Route::get("execute-payment","PaymentController@execute")->name("execute-payment");
Route::get("cancel-payment","PaymentController@cancel");
Route::get("execute-aggrement/{status}","SubscriptionController@execute")->name('agrement');
Route::get("plan/create","SubscriptionController@create");
Route::get("plan/list","SubscriptionController@listPlan");
Route::get("plan/active/{id}","SubscriptionController@activePlan");
Route::get("plan/{id}/agrement/create","SubscriptionController@createAgrement")->name('rpayment');

//**************Search Functionality ***************/
Route::get("advance-search","SearchController@index");
Route::get('get_data', 'FrontAdsController@getbanner');
Route::get("contact","NavigationController@contact");
Route::get("comment_and_suggestion","NavigationController@comment_and_suggestion");


