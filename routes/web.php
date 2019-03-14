<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'UserController@ind');
Route::get('contact', 'ContactController@getContact');
Route::post('contact', 'ContactController@postContact');

Route::get('privacypolicy', 'UserController@privacy');


Route::get('admin-register/werbrtyrsequew/ntui', 'AdminController@admin_reg')->name('auth.admin-register');
Route::post('admin-register/post-werbrtyrsequew/ntui', 'AdminController@p_admin_reg')->name('auth.a_register');
// Authentication Routes...
Route::get('auth/login', 'SigningController@showForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('auth/register', 'SignupController@showRegistrationForm')->name('auth.register');
Route::get('account/register', 'SignupController@ntui')->name('auth.ref_register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('account/post-register', 'SignupController@postRegistrationForm');

// Password Reset Routes...
Route::get('password/reset', 'SigningController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'SigningController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('user/dashboard', 'HomeController@dashboard')->name('user.dashboard');

Route::get('user/deposit', 'HomeController@deposit')->name('user.deposit');
Route::post('user/post-deposit', 'HomeController@postDeposit')->name('user.post-deposit');
Route::post('user/update-deposit', 'HomeController@depositUpdate')->name('user.update-deposit');
Route::get('delete-deposit/{id}', 'HomeController@destroy');
Route::get('user/withdraw', 'HomeController@withdraw')->name('user.withdraw');
Route::post('user/post-withdraw', 'HomeController@postWithdraw')->name('user.post-withdraw');
Route::post('user/post-referral-withdraw', 'HomeController@postReferralWithdrawal')->name('user.post-referral-withdraw');
Route::post('user/post-reinvest-total', 'HomeController@postReinvestTotal')->name('user.post-reinvest-total');
Route::post('user/post-reinvest-referral', 'HomeController@postReinvestReferral')->name('user.post-reinvest-referral');
Route::get('/delete-withdrawal/{id}', 'HomeController@destroyWithdrawal');
Route::get('user/invoice', 'HomeController@invoice')->name('user.invoice');
Route::get('user/transaction', 'HomeController@transaction')->name('user.transaction');
Route::get('user/profile', 'HomeController@profile')->name('user.profile');
Route::post('user/update-profile-picture', 'HomeController@update_profile_picture')->name('user.update-profile-picture');
Route::get('user/message', 'HomeController@getMessage')->name('user.message');
Route::get('user/transactions', 'HomeController@transactions')->name('user.transactions');
Route::get('/confirm-payment/{id}', 'AdminController@confirm_payment');
Route::get('user/manage-users', 'HomeController@manageUsers')->name('user.manage-users');
Route::get('user/withdrawals', 'HomeController@withdrawals')->name('user.withdrawals');
Route::get('user/withdrawals_recycle', 'HomeController@withdrawals_recycle_bin')->name('user.withdrawals_recycle');
Route::get('/confirm-withdrawal-payment/{id}', 'AdminController@confirm_withdrawal_payment');
Route::get('/confirm-referral-withdrawal-payment/{id}', 'AdminController@confirm_referral_withdrawal_payment');
Route::get('/purge-user/{id}', 'AdminController@purgeUser');
Route::get('user/referrals', 'HomeController@referrals')->name('user.referrals');
Route::get('user/create-announcement', 'AdminController@announcement');
Route::post('user/post-create-announcement', 'AdminController@postAnnouncement');

//Route::get('api/bitpay', 'UserController@bitpayRequest');

//apis
Route::group(['prefix' => 'api', 'middleware' => 'auth' ], function(){
    Route::get('link', 'Api\HomeController@link');
    Route::get('dash', 'Api\HomeController@dashboard2');
    Route::get('referral', 'Api\HomeController@referrals');
    Route::get('user', function (Request $request) {
        //return $request->user();
         return auth()->user();
    });
   // Route::get('invoice', 'Api\HomeController@invoice');
   // Route::get('payto', 'Api\HomeController@pay_to');
    Route::post('update-profile', 'Api\HomeController@postUpdate');
    Route::post('update-profile-picture', 'Api\HomeController@update_profile_picture');
    Route::post('message', 'Api\HomeController@postMessage');
    Route::get('dash', 'Api\HomeController@dashboard2');
    Route::get('all-transactions', 'Api\AdminController@allTransactions');
    Route::get('transactions', 'Api\HomeController@getContracts');
    Route::get('auth-transactions', 'Api\HomeController@getAuthContracts');
    //Route::get('auth-referrals', 'Api\HomeController@getAuthReferral');
    Route::get('invoices', 'Api\HomeController@invoice');
    Route::get('manage-users', 'Api\AdminController@getAllUsers');
    Route::get('withdraw', 'Api\HomeController@apiWithdraw');
    Route::get('withdraw1', 'Api\HomeController@apiWithdraw1');
    Route::get('referral-withdraw', 'Api\HomeController@apiReferralWithdraw');
    Route::get('ref-calculate', 'Api\HomeController@referralCalculate');
    Route::get('deposit-count', 'Api\HomeController@depositCount');
    Route::get('client-deposit', 'Api\HomeController@clientDeposit');
    Route::get('withdrawal-count', 'Api\HomeController@withdrawalCount');
    Route::get('client-withdrawal', 'Api\HomeController@clientWithdrawal');
    Route::get('announcement', 'Api\HomeController@announcement');
     Route::get('notifications', 'Api\HomeController@getNotifications');
    Route::post('notifications/read', 'Api\HomeController@read');
    Route::get('dashboard-transactions', 'Api\HomeController@dashboardTransactions');
    //Route::get('reg', 'Api\HomeController@reg');
    /*Route::get('user/{id}', function($id) {
        return $id;
    });*/

});




    Route::get('login', ['as' => 'login', 'uses' => function() {
    return redirect()->to(url('/'));
}]);
Route::get('register', function () {
    return redirect()->to(url('/'));
});

