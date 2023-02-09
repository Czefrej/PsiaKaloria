<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory;

    protected $table = 'products_history';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;
}
