<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalShelter extends Model
{
    use HasFactory;

    protected $table = 'animal_shelters';

    public $incrementing = true;

    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }
}
