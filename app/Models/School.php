<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'short_code',
        'district',
        'city',
        'street',
        'principle'
    ];
}
