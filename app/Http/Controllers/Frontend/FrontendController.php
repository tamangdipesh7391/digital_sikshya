<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Subject;
use App\Models\SubjectContent;
use App\Models\SubjectLevel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $total_grades = Grade::count();
        $total_subjects = Subject::count();
        $total_contents = SubjectContent::count();
        $total_levels = Level::count();

        $grades = Grade::all();
        $subjects = Subject::where('status','=','1')->get();
        return view('Frontend.home',[
            'grades' => $grades,
            'subjects' => $subjects,
            'total_grades' => $total_grades,
            'total_subjects' => $total_subjects,
            'total_contents' => $total_contents,
            'total_levels' => $total_levels

        ]);
    }

    public function subjects($id){
        $gradeSub = Subject::where('grade','=',$id)
        ->where('status','=','1')
        ->get();

        return view('Frontend.pages.gradeSubject',[
            'gradeSub' => $gradeSub
        ]);
    }

    public function subjectLevel($gid,$sid){
        $subjectLevel = SubjectLevel::where('grade','=',$gid)
        ->where('subject','=',$sid)
        ->get();

        return view('Frontend.pages.subjectLevel',[
            'subjectLevel' => $subjectLevel
        ]);
    }
    public function subjectContent($gid,$sid,$lid){
        $subjectContent = SubjectContent::where('grade','=',$gid)
        ->where('subject','=',$sid)
        ->where('level','=',$lid)
        ->get();

        return view('Frontend.pages.subjectContent',[
            'subjectContent' => $subjectContent
        ]);
    }

    public function ContentDetails($gid,$sid,$lid){
        $contentDetails = SubjectContent::where('grade','=',$gid)
        ->where('subject','=',$sid)
        ->where('level','=',$lid)
        ->get();

        return view('Frontend.pages.contentDetails',[
            'contentDetails' => $contentDetails
        ]);
    }
    


}
