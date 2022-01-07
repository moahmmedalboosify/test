<?php

namespace App\Http\Controllers\settings;

use auth ;
use App\Product;
use App\section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections= section::all();
        $products= Product::all();
       return view('settings.section',compact('sections','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $validated = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required'
        ],[
            'section_name.required' => 'the name section is requerd',
            'section_name.unique' => 'القسم موجود فعلا ',
            'section_name.max' => ' log char',
            'description.required' => 'the note section is requerd'
            
        ]);

        section::create([
            'section_name' => $request->section_name,
            'description' => $request->description,
            'create_by' => auth::user()->id
        ]);

        Session::flash('add-section','done');
    
       return redirect('/sections');
   
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


    public function update(Request $request)
    {
      
        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description' => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        $sections = section::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        Session::flash('update','done');
    
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        if(section::find($request->id)){
            section::find($request->id)->delete();
            session()->flash('delete-section','تم حذف القسم بنجاح ');  
        }else{
            session()->flash('delete-section','عذرا القسم الذي تحاول حذفه غير موجود ');
        }

        return redirect('/sections');

    }
}
