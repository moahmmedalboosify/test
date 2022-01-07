<?php

namespace App\Http\Controllers\settings;

use App\Product;
use App\section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = section::all();
        $products = product::all();
        return view('settings.product',compact('sections','products'));
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
            'product_name' => 'required|max:255',
            'section' => 'required' ,
            'description' => 'required' 
        ]);

        Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$request->section,
        ]);
        Session::flash('add-section','done');


        return  redirect('/products');
    }
   



    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
          $val=$request->validate([
                'product_name' => 'required|max:100',
                'section' => 'required',
                'description' => 'required'
          ]);
          
          if(Product::find($request->id)){
             Product::where('id',$request->id)->update([
              'product_name' => $request->product_name,
              'description' => $request->description,
              'section_id' => $request->section
            ]);
            session::flash('update','تم تحديث بيانات المنتج بنجاح');
           }
          return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         Product::find($request->id)->delete();
         session()->flash('delete-product','تم حذف القسم بنجاح ');  
         return redirect('products');
    }
}
