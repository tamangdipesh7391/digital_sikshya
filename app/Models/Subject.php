<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'grade',
        'status'
    ];
    public function getGradeName(){
        return $this->belongsTo(Grade::class,'grade','id');
    }

    public function getTitleAttribute($val){
        return ucfirst($val);
    }
}
