<?php

namespace App\Http\Controllers;

use App\Model\Repair;
use Illuminate\Http\Request;
use App\Model\Customer;
use PDF;
class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $repairs = Repair::latest()->paginate(25);
      return view('repair.index', compact('repairs'))
                ->with('i', (request()->input('page',1) -1)*25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('repair.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'brand' => 'required',
        'model' => 'required',
        'imei' => 'required',
        'type' => 'required',
        'discription' => 'required',
        'parts' => 'required',
        //'status' => 'required',
        'price' => 'required',
          //'customer_id' => 'required'
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'phone' => 'required',

      ]);

      $customer = new Customer();
      $customer->fname = $request->fname;
      $customer->lname = $request->lname;
      $customer->address = $request->address;
      $customer->phone = $request->phone;
      $cust = Customer::firstOrNew($customer->toArray());
    
      $cid = $cust->id;
      if($cid === null){

        $customer->save();
        $cid = $customer->id;
      }
      $repair = new Repair();
      $repair->brand = $request->brand;
      $repair->model = $request->model;
      $repair->imei = $request->imei;
      $repair->type = $request->type;
      $repair->discription = $request->discription;
      $repair->parts = $request->parts;
      $repair->status = false;
      $repair->price = $request->price;
      $repair->customer_id = $cid;
      $repair->save();

      // Repair::create($request->all());
      return redirect()->route('repair.index')
                      ->with('success', 'new Repair created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Repair  $repairs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $repair = Repair::find($id);
      return view('repair.detail', compact('repair'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Repair  $repairs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $repair = Repair::find($id);
      return view('repair.edit', compact('repair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Repair  $repairs
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

      $repair = Repair::find($id);
      if($repair->status == true){
         $repair->status = false;
      }else{
         $repair->status = true;
      }
     
      $repair->save();
      return redirect()->route('repair.index')
                      ->with('success', 'Repair updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Repair  $repairs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $repair = Repair::find($id);
      $repair->delete();
      return redirect()->route('repair.index')
                      ->with('success', 'Repair deleted successfully');
    }

    public function printReceipt($id)
    {
       $repair = Repair::find($id);
       
       $pdf = PDF::loadView('repair.receipt', compact('repair'));
      return $pdf->download('invoice.pdf');

      

    }
    public function showReceipt($id)
    {
       $repair = Repair::find($id);
       
      
      return view('repair.receipt', compact('repair'));

      

    }

    
}
