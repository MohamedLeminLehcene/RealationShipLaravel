<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['code','phone','user_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','user_id'];

    ##################### Beign RealationShip one To One #################

    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id');
    }

    ##################### End RealationShip one To One ###################
}
