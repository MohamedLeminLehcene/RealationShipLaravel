<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','created_at','updated_at','country_id'];
    protected $hidden = ['created_at','updated_at'];


    #################### Start RealationShip One To Many ###################

    public function doctors()
    {
        return $this -> hasMany('App\Models\Doctor','hospital_id','id');
    }

    #################### End RealationShip One To Many #####################
    
}

