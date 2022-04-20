<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'title',
        'thumbnail',
        'inner_img',
        'front_img',
        'back_img',
        'left_img',
        'right_img',
        'top_img',
        'bottom_img',
        'meta_description',
        'description',
        'status'
    ];

    public function uploadImg($request,$name){
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('images');
            if (!$file->move($uploadPath, $filename)) {
                return redirect()->back()->with('error', 'File Coundnot uploaded.');
            } else {
                return $filename;
            }
        }
    }
}
