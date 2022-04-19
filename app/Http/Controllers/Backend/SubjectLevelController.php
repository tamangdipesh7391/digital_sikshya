<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Subject;
use App\Models\SubjectLevel;
use Illuminate\Http\Request;

class SubjectLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
     
       if($request->isMethod('get')){
           $grades = Grade::all();
        $subjectlevelData = SubjectLevel::where('level','=',$id)->get();
        $data = Level::findOrFail($id);
        $subjects = Subject::all();
        return view('Backend.pages.subjectlevel.add',[
            'level' => $data,
            'subjects' => $subjects,
            'subjectlevelData' => $subjectlevelData,
            'grades' => $grades
        ]);
       }

       if($request->isMethod('post')){
        //    dd($request);
           $request->validate([
               'subject' => 'required',
           ]);
           for($i = 0 ; $i < sizeof($request->subject);$i++){
               $checkDuplicate = SubjectLevel::where('level','=',$request->level)
               ->where('subject','=',$request->subject[$i])
               ->where('grade','=',$request->grade)
               ->get();
               if($checkDuplicate->count()>0){
                    $duplicates[$i] = $checkDuplicate[0]['subject'];
               }else{
                $input = new SubjectLevel();
                $input['level'] = $request->level;
                $input['grade'] = $request->grade;
                $input['subject'] = $request->subject[$i];
                $input->save();
               }

              
                
           }

          
          if(!empty($duplicates)){
            $str = ""; 
            for($e = 0; $e < sizeof($duplicates); $e++){
                $sub = Subject::findOrFail($duplicates[$e]);
                if($sub->count()>0){
                    $str .= $sub['title'];
                    if($e < (sizeof($duplicates) - 1)){
                        $str .= ",";
                    }
                }
            }
            
          }
          if(isset($str) && $str != ""){
            
            return redirect()->back()->with('error','Duplicate Data inserted. ('.$str.')');

          }else{
          
            return redirect()->back()->with('success','Data has been inserted successfully.');

          }
         
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubjectLevel::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data has been deleted successfully.');
    }
       // toggling status of subject level
       public function toggleStatus(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
    
        if($request->isMethod('post')){
           $criteria=$request->criteria;
           $obj = SubjectLevel::findOrFail($criteria);
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

// get subject ajax code 
        public function getSubject(Request $request){
            if($request->ajax()){
                $subjecs = Subject::where('grade','=',$request->grade)->get();
                return response()->json(['subject' => view('Backend.pages.subjectlevel.gradeWiseSubject',['subjects' => $subjecs])->render()]);
            }
        }
}
