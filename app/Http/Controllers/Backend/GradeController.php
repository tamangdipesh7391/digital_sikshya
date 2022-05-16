<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradeData = Grade::paginate(25);
        return view('Backend.pages.grade.index',['GradeData' => $gradeData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       if($request->isMethod('get')){
            return view('Backend.pages.grade.add');
       }
       if($request->isMethod('post')){
            $request->validate([
                'title' => 'required|unique:grades,title'
            ]);

            $gradeData = $request->all();
            Grade::create($gradeData);
            return redirect()->back()->with('success','Grade has been added successfully');

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
            $gradeData = Grade::paginate(25);
            $singleGradeData = Grade::findOrFail($id);
            return view('Backend.pages.grade.index',[
                'singleGradeData' => $singleGradeData,
                'GradeData' => $gradeData
            ]);
        }
        if($request->isMethod('post')){
            $request->validate([
                'title' => ['required',
                Rule::unique('grades','title')->ignore($id)
                ]
            ]);
            $updatedData = Grade::findOrFail($id);
            $input = $request->all();
            $updatedData->update($input);
            return redirect()->route('manage-grade')->with('success','Data has beed updated successfuly.');

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
        Grade::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');

    }
}
