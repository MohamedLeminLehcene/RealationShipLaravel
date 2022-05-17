<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    use HasFactory;
    protected $fillable = ['name','age'];
    public $timestamps = "false";

    ################# RealationSip Has One Througth ################
    public function doctor()
    {
        return $this -> hasOneThrough('App\Models\Doctor','App\Models\Medical','patient_id','medical_id','id','id');
    }

}
