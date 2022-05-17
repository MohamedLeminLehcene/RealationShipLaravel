<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','pivot'];


    ########################### Start RealationShip Many To Many ################

    public function doctors()
    {
        return $this -> belongsToMany('App\Models\Doctor','doctor_serivce','service_id','doctor_id','id','id');
    }

    ########################### End RealationShip Many To Many ################
}
