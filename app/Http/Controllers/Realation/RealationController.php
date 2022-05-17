<?php

namespace App\Http\Controllers\Realation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Patient;
use App\Models\Country;

class RealationController extends Controller
{
    public function hasOne()
    {
        $user = User::with(['phone' => function($q){
            $q -> select('code','phone','user_id');
        }])->find(1);
      //return  $user -> phone;
        return $user;

    }

    public function getPhoneUserReverse()
    {
        $phone = Phone::with(['user' => function($q){
            $q -> select('id','name','email');
        }])->find(1);
         $phone -> makeVisible(['user_id']); //function must visible some attributes
        // $phone -> makeHidden(['code']);
        // return $phone -> user;
        return $phone;
    }

    public function getUserWhereHasPhone()
    {
        $users = User::whereHas('phone')->get(); 
        return $users;
    }

    public function getUserWhereHasPhoneWithCondition()
    {
        $users = User::whereHas('phone',function($q){
            $q -> where('city','=','Nktt');
        })->get();

        return $users;
    }

    public function getUserWhereNotHasPhone()
    {
        $users = User::whereDoesntHave('phone')->get();
        return $users;
    }
    

    public function hasOneToMany()
    {
        $hospital = Hospital::with(['doctors'  => function($q){
            $q -> select('name','hospital_id');
        }])->find(1);
       // return $hospital -> doctors;
       return $hospital;
    }

    public function getHospitalDoctorWithRealation()
    {
        $doctor = Doctor::with('hospital')->find(1);
        //return $doctor -> hospital;
        return $doctor;
    }

    public function getHospitalWhereHasDoctor()
    {
        $hospitals = Hospital::whereHas('doctors')->get();
        return $hospitals;
    }

    public function getHospitalWhereNotHasDoctor()
    {
        $hospitals = Hospital::whereDoesntHave('doctors')->get();
        return $hospitals;
    }


    public function index()
    {
        $hospitals = Hospital::all();
        return view('Hospitals.index',compact('hospitals'));

    }

    public function getDoctorsWithId($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);

        if(!$hospital)
        {
            return redirect() -> back() -> with(['error' => 'This Hospital Doesnt Exist']);
        }


        $doctors = $hospital -> doctors;

        return view('Hospitals.doctors',compact('doctors'));
    }

    public function hospitalDelete($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        if(!$hospital)
        return abort('404');
        $hospital -> doctors() -> delete();
        $hospital -> delete();
        return redirect() -> back();
    }

    public function getDoctorServices()
    {
        $doctor = Doctor::with('services')->find(5);
       // return $doctor -> services;
       return $doctor; //get doctor + this services
    }
    
    public function getServiceDoctors()
    {
        $service = Service::with('doctors')->find(1);
        //return $service -> doctors;
        return $service;
    }
    public function getServicesDoctorById($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        if(!$doctor)
        return abort('404');
        $services = $doctor -> services;

        $doctorsAll = Doctor::select('id','name')->get();
        $servicesAll = Service::select('id','name')->get();

        return view('Hospitals.services',compact('services','doctorsAll','servicesAll'));
    }

    public function saveManyToMany(Request $request)
    {
        $doctor = Doctor::find($request -> doctorId);
        if(!$doctor)
        
        return abort('404');
        $doctor -> services() -> syncWithoutDetaching($request -> services);
        return "success";
    }

   public function getDoctorsCountry()
   {
       $country = Country::with('doctors')->find(1);
       return $country ;
   }

}
