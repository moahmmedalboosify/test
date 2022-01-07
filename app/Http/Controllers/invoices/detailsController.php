<?php

namespace App\Http\Controllers\invoices;

use App\Http\Controllers\Controller;
use App\invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class detailsController extends Controller
{

    public function index($id)
    {

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
        $invoices = invoice::where('id', $id)->get();
        return view('invoices.detiles', compact('invoices'));
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
        //
    }

    public function show_image($id)
    {
        $invoices = invoice::where('id', $id)->first();
        $contents = Storage::getDriver()->getAdapter()->applyPathPrefix($invoices->image);
        return response()->file($contents);
    }

    public function download_image($id)
    {
        $invoices = invoice::where('id', $id)->first();
        $contents = Storage::getDriver()->getAdapter()->applyPathPrefix($invoices->image);
        return response()->download($contents);
    }

    public function delete_image(Request $request)
    {
        $invoices = invoice::where('id', $request->id_file)->delete();
      
        $contents = Storage::delete();
        return back();
    }

}
