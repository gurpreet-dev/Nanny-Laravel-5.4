<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'GuestsController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page/{slug}', 'GuestsController@getPageBySlug');

Auth::routes();

Route::any('/nanny/register', 'Auth\RegisterController@nannyRegister');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'AdminauthController@showlogin')->name('admin.login');
    Route::post('/login', 'AdminauthController@login');
    Route::get('/logout', 'AdminauthController@logout')->name('admin.logout');

    /********************/

    Route::get('/nannies', 'NanniesController@index');  // List of nannies
    Route::get('/nannies/add', 'NanniesController@create'); // Show add form
    Route::post('/nannies/add', 'NanniesController@store')->name('addnanny');   //  add nanny 
    Route::any('/editnanny/{id}', 'NanniesController@edit')->name('editnanny');  //  Show edit form
    Route::any('/viewnanny/{id}', 'NanniesController@view')->name('viewnanny');  //  view nanny
    Route::any('/cpnanny/{id}', 'NanniesController@changepassword')->name('cpnanny');  //  change password
    Route::any('/nannies/delete/{id}', 'NanniesController@delete');  //  Delete Nanny
    Route::any('/availability', 'NanniesController@availabilities')->name('availability');  //  Manage avilability
    Route::any('/nanny/schedule/{id}', 'NanniesController@schedule')->name('schedule');

    /********************/

    Route::get('/users', 'AdminUsersController@index');  // List of users
    Route::any('/users/add', 'AdminUsersController@add')->name('adduser');  //  add User
    Route::any('/users/edit/{id}', 'AdminUsersController@edit')->name('edituser');  //  edit User
    Route::get('/users/view/{id}', 'AdminUsersController@view')->name('viewuser');  //  view User
    Route::any('/users/delete/{id}', 'AdminUsersController@delete')->name('deleteuser');  //  delete User
    Route::any('/users/cp/{id}', 'AdminUsersController@changepassword')->name('cpuser');  //  delete User
    Route::any('/users/cs/{id}/{status}', 'AdminUsersController@changeStatus')->name('csuser');  //  delete User

    /********************/

    Route::get('/nanny/requests', 'NanniesController@requests');
    Route::any('/nanny/requestview/{id}', 'NanniesController@requestView');
    Route::any('/nanny/requestaction/{id}', 'NanniesController@requestAction');
    Route::any('/nanny/changestatus/{id}/{status}', 'NanniesController@changeStatus');

    /********************/

    Route::get('/nanny/orders', 'NanniesController@orders');
    Route::get('/nanny/orders/{id}', 'NanniesController@orderView');
    Route::any('/nanny/order/attendence/{id}', 'NanniesController@orderAttendence')->name('attendence');
    Route::get('/nanny/attendence/{id}', 'NanniesController@monthlyAttendence')->name('monthlyAttendence');
    Route::any('/nanny/manual_checkin/{id}', 'NanniesController@manualCheckin')->name('manualCheckin');

    /********************/

    Route::get('/requests/{id}', 'AdminRequestsController@requests');
    Route::get('/requests/pinch', 'AdminRequestsController@pinchRequests');
    Route::get('/requests/interests/{id}', 'AdminRequestsController@getInterestedNanniesForRequest');
    Route::get('/requests/assign/{id}/{nanny}', 'AdminRequestsController@assignNannyToRequest');
    Route::get('/requests/unassign/{id}', 'AdminRequestsController@unassignNannyFromRequest');
    
    /********************/

    Route::get('/bookings', 'AdminOrdersController@index');
    Route::get('/bookings/attendence/{id}', 'AdminOrdersController@bookingAttendence');
    Route::get('/bookings/nannies/{order_id}', 'AdminOrdersController@nannies');
    Route::get('/bookings/changenanny/{order_id}/{nanny_id}', 'AdminOrdersController@changeNanny');

    /********************/

    Route::get('/contacts', 'AdminController@contacts');
    Route::any('/contacts/edit/{id}', 'AdminController@editContact')->name('editContact');

    /********************/

    Route::get('/services', 'AdminServicesController@index');
    Route::any('/services/add', 'AdminServicesController@add')->name('addService');
    Route::any('/services/edit/{id}', 'AdminServicesController@edit')->name('editService');
    Route::any('/services/delete/{id}', 'AdminServicesController@delete')->name('deleteService');

    /********************/

    Route::get('/prices', 'AdminServicesController@prices');
    Route::any('/prices/add', 'AdminServicesController@addPrice')->name('addPrice');
    Route::any('/prices/edit/{id}', 'AdminServicesController@editPrice')->name('editPrice');
    Route::any('/prices/delete/{id}', 'AdminServicesController@deletePrice')->name('deletePrice');

    /********************/

    Route::get('/service_payments', 'AdminController@servicePayments');
    Route::get('/order_payments', 'AdminController@orderPayments');

    /********************/

    Route::get('/pages', 'AdminController@pages');
    Route::any('/pages/add', 'AdminController@addPage')->name('addpage');
    Route::any('/pages/edit/{id}', 'AdminController@editPage')->name('editpage');
    Route::any('/pages/delete/{id}', 'AdminController@deletePage');

});

Route::get('after/redirecttopaypal', 'UsersController@paypalaftersignup'); // Redirect to paypal for agreement after signup
Route::get('after/payment', 'HomeController@payment_after_signup'); // Payment after signup Page
Route::post('after/payment', 'UsersController@signuppayment');

Route::group(['prefix' => 'user'], function () {
    Route::get('/profile', 'UsersController@profile');  // User Profile Page
    Route::any('/changepassword', 'UsersController@changePassword');    // Change user password page
    Route::any('/card', 'UsersController@editCard');    // Edit credit card details
    Route::get('/payments', 'UsersController@payments');    // List of Invoices & Payments done
    Route::get('/requests', 'UsersController@requests');   

    /***********************/

    Route::get('/notsubscribed', 'UsersController@notsubscribed');
    Route::post('/cancelrequest', 'UsersController@cancelRequest')->name('cancelRequest');  
    Route::post('/addreview', 'UsersController@addReview')->name('addReview');  
    Route::any('/editprofile', 'UsersController@editProfile');  

    /***********************/

    Route::get('/bookings', 'UsersController@bookings');
    Route::get('/bookings/{id}', 'UsersController@getBooking');

    /******* Invoice ********/

    Route::any('/invoice/{id}', 'UsersController@invoice');  
    Route::any('/invoice_payment/{id}', 'UsersController@invoicePayment');  
    Route::get('/iwpp/{id}', 'UsersController@invoicePaymentPaypal');  
    Route::any('/payment/confirmation', 'UsersController@paymentConfirmation');  
    

    /************************/
    

});   

// Route::any('/requestcare', 'UsersController@requestCare');  //request a Care page
// Route::any('/requestcare/pinch', 'UsersController@requestCarePinch');  //request a Care page

Route::any('/requestcare/{type}', 'UsersController@requestCare');

Route::any('/reviews', 'GuestsController@reviews')->name('reviews');
Route::get('/yelpreviews', 'GuestsController@yelpReviews')->name('yelpreviews');
Route::any('/contact', 'GuestsController@contact')->name('contact');
Route::any('/pricings', 'GuestsController@pricings')->name('pricings');

Route::any('/test', 'GuestsController@test');

Route::any('/generate_nvoice', 'GuestsController@generateInvoice');
