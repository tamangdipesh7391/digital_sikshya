<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SubjectContent;
use App\Models\SubjectLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sid)
    {
    
        $subjectlevel = SubjectLevel::where('subject','=',$sid)->get();
        // dd($subjectlevel);
        return view('Backend.pages.subjectcontent.index',[
            'subjectlevel' => $subjectlevel
        ]);
        // $subjectcontentData = SubjectContent::where('subject','=',$sid)
        // ->where('grade','=',$gid)
        // ->paginate(25);
        // return view('Backend.pages.subjectcontent.index',[
        //     'subjectcontent' => $subjectcontentData
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $sid,$gid,$lid)
    {
        if($request->isMethod('get')){
                   return view('Backend.pages.subjectcontent.add');
        }

       if($request->isMethod('post')){
           
           $request->validate([
            'heading' => 'required|unique:subject_contents,heading',
            'title' => 'required|unique:subject_contents,title',
            'thumbnail' => 'required|mimes:jpg,png,jpeg|max:2048',
            'meta_description' => 'required',
            'description' => 'required'

           ]);
        $data = new SubjectContent();
        $data->subject = $sid;           

        $data->grade = $gid;
        $data->level = $lid;
        $data->heading = $request->heading;
        $data->title = $request->title;
        $data->meta_description = $request->meta_description;
        $data->description = $request->description;
       
        $data->thumbnail = $data->uploadImg($request,'thumbnail');
        $data->inner_img = $data->uploadImg($request,'inner_img');
        $data->front_img = $data->uploadImg($request,'front_img');
        $data->back_img = $data->uploadImg($request,'back_img');
        $data->left_img = $data->uploadImg($request,'left_img');
        $data->right_img = $data->uploadImg($request,'right_img');
        $data->top_img = $data->uploadImg($request,'top_img');
        $data->bottom_img = $data->uploadImg($request,'bottom_img');

        
       
        $data->save();
        return redirect()->back()->with('success','Data has been inserted successfully.');
        

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

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sid,$gid,$lid)
    {
        $subwisecontentData = SubjectContent::where('subject','=',$sid)
        ->where('grade','=',$gid)
        ->where('level','=',$lid)
        ->paginate(25);
        return view('Backend.pages.subjectcontent.show',[
            'subwisecontentData' =>$subwisecontentData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $singlesubcontentData = SubjectContent::findOrFail($id);
            return view('Backend.pages.subjectcontent.viewonly',[
                'singlesubcontentData' => $singlesubcontentData
            ]);
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
        if($request->isMethod('get')){
            $singlesubcontentData = SubjectContent::findOrFail($id);
            return view('Backend.pages.subjectcontent.edit',[
                'singlesubcontentData' => $singlesubcontentData
            ]);
        }

        if($request->isMethod('post')){
            $request->validate([
                'heading' => ['required',Rule::unique('subject_contents')->ignore($id)],
                'title' => ['required',Rule::unique('subject_contents')->ignore($id)]
                
    
               ]);
            $data = SubjectContent::findOrFail($id);
           
            $data->heading = $request->heading;
            $data->title = $request->title;
            $data->meta_description = $request->meta_description;
            $data->description = $request->description;
            if($request->thumbnail != ""){
                $data->thumbnail = $data->uploadImg($request,'thumbnail');
            }
            if($request->inner_img != ""){
                $data->inner_img = $data->uploadImg($request,'inner_img');
            }
            if($request->front_img != ""){
                $data->front_img = $data->uploadImg($request,'front_img');
            }
            if($request->back_img != ""){
                $data->back_img = $data->uploadImg($request,'back_img');
            }
            if($request->left_img != ""){
                $data->left_img = $data->uploadImg($request,'left_img');
            }
            if($request->right_img != ""){
                $data->right_img = $data->uploadImg($request,'right_img');
            }
            if($request->top_img != ""){
                $data->top_img = $data->uploadImg($request,'top_img');
            }
            if($request->bottom_img != ""){
                $data->bottom_img = $data->uploadImg($request,'bottom_img');
            }
            $sid = $data->subject;
            $gid = $data->grade;
            $lid = $data->level;

            $data->save();
            return redirect('admin-panel/show-subjectcontent/'.$sid.'/'.$gid.'/'.$lid)->with('success','Data has been Modified successfully.');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       SubjectContent::findOrFail($id)->delete();
       return redirect()->back()->with('success','Data has been deleted successfully.');
    }
}
