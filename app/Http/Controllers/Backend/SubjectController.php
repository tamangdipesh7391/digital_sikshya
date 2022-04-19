<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $gradeData = Grade::all();
        $subjectData = Subject::paginate(25);
        return view('Backend.pages.subject.index',[
            'gradeData' => $gradeData,
            'subjectData' => $subjectData
        ]);
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $grades = Grade::all();
            return view('Backend.pages.subject.add',[
                'grades' => $grades
            ]);
        }

        if($request->isMethod('post')){

            $request->validate([
                'title' => 'required',
                'grade' => 'required'
            ]);
            $checkDuplicate = Subject::where('title','=',$request->title)
            ->where('grade','=',$request->grade)
            ->get();
            if($checkDuplicate->count()>0){
                return redirect()->back()->with('error','Suject already added.');
                 
            }else{
                $subjectData = $request->all();
                Subject::create($subjectData);
                return redirect()->back()->with('success','Suject added successfully.');
     
            }

                  }
    }

    public function destroy($id){
        Subject::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
    }

    public function update(Request $request,$id){
        if($request->isMethod('get')){
          
            $singleSubjectData = Subject::findOrFail($id);
              $SujectData = Subject::all();
            $grades = Grade::all();
            return view('Backend.pages.subject.edit',[
                'singleSubjectData' => $singleSubjectData,
                'SujectData' => $SujectData,
                'grades' => $grades
            ]);
        }

        if($request->isMethod('post')){
            $request->validate([
                'title' => 'required',
                'grade' => 'required'
            ]);

            $checkDuplicate = Subject::where('title','=',$request->title)
            ->where('grade','=',$request->grade)
            ->get();
            if($checkDuplicate->count()>0 && $checkDuplicate[0]['id'] != $id){
                return redirect()->route('manage-subject');
                 
            }else{
                $updatedData = Subject::findOrFail($id);
                $input = $request->all();
                $updatedData->update($input);
                return redirect()->route('manage-subject')->with('success','Data has beed updated successfuly.');
    
            }

           
        }
    }

        // toggling status of subject
        public function toggleStatus(Request $request){
            if($request->isMethod('get')){
                return redirect()->back();
            }
        
            if($request->isMethod('post')){
               $criteria=$request->criteria;
               $obj = Subject::findOrFail($criteria);
               if(isset($_POST['active'])){
                $obj->status=0;
               }
        
               if(isset($_POST['inactive'])){
                $obj->status=1;
               }
        
               $obj->update();
        
               return redirect()->back()->with('success','Status has been changed.');
            }
        
    }

            //end status
    
}
