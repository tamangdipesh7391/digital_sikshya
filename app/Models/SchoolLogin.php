<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLogin extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password'
    ];
}
