<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_Serivce extends Model
{
    use HasFactory;
    protected $table = "doctor_serivce";
    protected $fillable = ['doctor_id','service_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    
}
