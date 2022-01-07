<?php

namespace App\Http\Controllers\invoices;


use auth;
use App\User;
use App\invoice;
use App\Product;
use App\section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\invoices\add\discount;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Notifications\invoice_notifcation;
use Illuminate\Support\Facades\Notification;

class add_invoicesController extends Controller
{

    public function index()
    {
        $sections = section::all();
        $products = Product::all();

        return view('invoices.add-invoice', compact('sections', 'products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
  
      

     
     //return $request->file('pic') ;

        // $val = $request->validate([
        //     'invoice_numbr' => 'required|digits_between:3,6',
        //     'invoice_Date' => 'required',
        //     'Due_date' => 'required|date|after:tomorrow',
        //     'Section' => 'required',
        //     'product' => 'required',
        //     'Amount_collection' => 'required',
        //     'state_invoice' => 'required',
        //     'Discount' => ['required', new discount],
        //     'Rate_VAT' => 'required',
        //     'note' => 'required|min:3|max:1000',
        //     'pic' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
     
        if ($request->hasFile('pic')) {
            $path = $request->file('pic')->store('image'); 
        }


       
      
        invoice::create([
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
            'image'          => $path,
            'user_id'        => auth::user()->id
        ]);
        
      
        $invoice_id = invoice::latest()->first()->id;
        $user= User::first();

        Notification::send($user, new invoice_notifcation($invoice_id));

        Session::flash('add-invoice','تم اضافة الفاتورة بنجاح');

        return redirect('invoices');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function get_section($id)
    {
        $products = Product::where('section_id', $id)->pluck('id', 'product_name');
        return json_encode($products);
    }
}
