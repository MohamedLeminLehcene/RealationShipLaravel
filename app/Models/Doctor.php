<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name','title','hospital_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','hospital_id','pivot'];

    #################### Start RealationShip One To Many ###################

    public function hospital()
    {
        return $this -> belongsTo('App\Models\Hospital','hospital_id','id');
    }

    #################### End RealationShip One To Many   ###################


    #########################  Start RealationShip Many To Many ######################

    public function services()
    {
        return $this -> BelongsToMany('App\Models\Service','doctor_serivce','doctor_id','service_id','id','id');
    }

    #########################  End RealationShip Many To Many ######################

    
    

    
}
