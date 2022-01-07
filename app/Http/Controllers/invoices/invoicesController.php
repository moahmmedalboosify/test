<?php

namespace App\Http\Controllers\invoices;

use auth;;
use App\invoice;
use App\Product;
use App\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Exports\invoiceExport;
use Maatwebsite\Excel\Facades\Excel;

class invoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $invoices = invoice::with('product','state_invoice')->get();
        return view('invoices.invoice',compact('invoices'));
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

    public function update_show_invoices($id)
    {
      $sections = section::all();
      $invoices = invoice::where('id',$id)->first();
      return view('invoices.update', compact('sections','invoices'));
    }

    public function update_data_invoices(Request $request)
    {
      invoice::where('id',$request->invoice_id)->update([
        'invoice_number' => $request->invoice_number,
        'invoice_Date'   => $request->invoice_Date,
        'Due_date'       => $request->Due_date,
        'product_id'     => $request->product,
        'section_id'     => $request->Section,
        'Amount_collection'     => $request->Amount_collection,
        'Amount_Commission'     => $request->Amount_Commission,
        'Discount'       => $request->Discount,
        'Value_VAT'      => $request->Value_VAT,
        'Rate_VAT'       => $request->Rate_VAT,
        'Total'          => $request->Total,
        'state_id'       => $request->state_invoice,
        'note'           => $request->note,
        'user_id'        => auth::user()->id
      ]);
      return redirect('/invoices');
    }

    public function delete_invoices(Request $request)
    {
         
      $invoices=invoice::find($request->id)->delete();

      Session::flash('delete-invoice','تم حذف الفاتورة بنجاح ');
      return redirect('/invoices');

    }

    public function export() 
    {
        return Excel::download(new invoiceExport, 'invoices.xlsx');
    }

}
