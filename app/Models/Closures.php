<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closures extends Model
{
    use HasFactory;

    protected $table = 'closures';

    protected $fillable = [
        'name',
        'packaging_id'
    ];
}
