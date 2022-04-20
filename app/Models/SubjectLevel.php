<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'level',
        'grade'
    ];

    public function getSubjectName(){
        return $this->belongsTo(Subject::class,'subject','id');
    }
    public function getGradeName(){
        return $this->belongsTo(Grade::class,'grade','id');
    }
    public function getLevelName(){
        return $this->belongsTo(Level::class,'level','id');
    }
}
