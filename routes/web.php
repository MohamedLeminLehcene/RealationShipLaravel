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


Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
    {


        ######################### Start Routing Offers ###############################

        Route::group(['prefix' => 'Offers'],function(){
            Route::get('create','OfferController@create')->name('offers.create');
            Route::post('store','OfferController@store')->name('offers.store');
            Route::get('index','OfferController@index')->name('offers.index');
            Route::get('destory/{offer_id}','OfferController@destroy')->name('offers.destroy');
            Route::get('edit/{offer_id}','OfferController@edit')->name('offers.edit');
            Route::post('update/{offer_id}','OfferController@update')->name('offers.update');
        });

        ######################### End Routing Offers ###############################

        

        Route::group(['prefix' => 'Realation','namespace' => 'Realation'],function(){

            ######################### Start Routing RealtionShip One To One ###############################

            Route::get('has-one-phone','RealationController@hasOne')->name('has.one');
            Route::get('get-phone-user-reverse','RealationController@getPhoneUserReverse')->name('get.phone.user.reverse');
            Route::get('get-user-were-has-phone','RealationController@getUserWhereHasPhone')->name('get.user.where.has.phone');
            Route::get('get-user-where-has-phone-with-condition','RealationController@getUserWhereHasPhoneWithCondition')->name('get.user.where.has.phone.with.condition');
            Route::get('get-user-where-not-has-phone','RealationController@getUserWhereNotHasPhone')->name('get.user.where.not.has.phone');
       
            ######################### End Routing RealtionShip One To One ###############################


            #################### Start Routing RealationShip One To Many ###################

            Route::get('has-one-to-many','RealationController@hasOneToMany')->name('has.one.to.many');
            Route::get('get-hospital-doctor-with-realation','RealationController@getHospitalDoctorWithRealation')->name('get.hospital.doctor.with.realation');
            Route::get('get-hospita-where-has-doctor','RealationController@getHospitalWhereHasDoctor')->name('get.hospital.where.has.doctor');
            Route::get('get-hospita-where-not-has-doctor','RealationController@getHospitalWhereNotHasDoctor')->name('get.hospital.where.not.has.doctor');

            
            #################### End Routing RealationShip One To Many   ####################

        });



 #################### Start Routing RealationShip One To Many MuiniProject   ####################


        Route::group(['prefix' => 'Hospitals','namespace' => 'Realation'],function(){
            Route::get('index','RealationController@index')->name('hospitals.index');
            Route::get('hospitals/{hospital_id}','RealationController@getDoctorsWithId')->name('doctors.with.id');
            Route::get('hospitals/delete/{hospital_id}','RealationController@hospitalDelete')->name('hospital.delete');
        });

        #################### End Routing RealationShip One To Many MuiniProject   ####################

        
        ####################### Start Routing RealationShip Many To Many #############################
        

        Route::group(['prefix' => 'ManyToMany','namespace' => 'Realation'],function(){
            Route::get('get-doctor-services','RealationController@getDoctorServices')->name('get.doctor.service');
            Route::get('get-service-doctors','RealationController@getServiceDoctors')->name('get.service.doctors');
            Route::get('services-doctor-by-id/{doctor_id}','RealationController@getServicesDoctorById')->name('get.services.doctor.by.id');
            Route::post('save-many-to-many','RealationController@saveManyToMany')->name('save.many.to.many');
            Route::get('get-doctors-counrty','RealationController@getDoctorsCountry')->name('get.doctors.country');
        });

        ####################### End Routing RealationShip Many To Many #############################




    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
