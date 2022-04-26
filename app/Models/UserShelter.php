<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShelter extends Model
{
    use HasFactory;
    protected $table = "user_shelter";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function shelter(){
        return $this->belongsTo('App\Models\Shelter');
    }


}
