<?php

namespace App\Traits;

Trait TraitOffer
{

   function savePhoto($path,$photo)
   {
    $file_extension = $photo -> getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $photo -> move($path,$file_name);
   
    return $file_name;
   }
   
}
