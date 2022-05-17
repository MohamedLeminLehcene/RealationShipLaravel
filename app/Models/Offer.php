<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['Name_ar','Name_en','Price','details_ar','details_en','Photo','created_at','updated_at'];


}
