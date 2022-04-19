<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LevelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelData = Level::paginate(25);
        return view('Backend.pages.level.index',['levelData' => $levelData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       if($request->isMethod('get')){
           $levelData = Level::all();
            return view('Backend.pages.level.add',[
                'levelData' => $levelData
            ]);
       }
       if($request->isMethod('post')){
            $request->validate([
                'title' => 'required|unique:levels,title'
            ]);

            $levelData = $request->all();
            Level::create($levelData);
            return redirect()->back()->with('success','Data has been added successfully');

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
            $levelData = Level::paginate(25);
            $singlelevelData = Level::findOrFail($id);
            return view('Backend.pages.level.add',[
                'singlelevelData' => $singlelevelData,
                'levelData' => $levelData
            ]);
        }
        if($request->isMethod('post')){
            $request->validate([
                'title' => 'required',Rule::unique('title')->ignore($id)
            ]);
            $updatedData = Level::findOrFail($id);
            $input = $request->all();
            $updatedData->update($input);
            return redirect()->route('add-level')->with('success','Data has beed updated successfuly.');

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
        Level::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');

    }

    //Toggle status
    public function toggleStatus(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
    
        if($request->isMethod('post')){
           $criteria=$request->criteria;
           $obj = Level::findOrFail($criteria);
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
}
