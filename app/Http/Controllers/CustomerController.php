<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = Customer::latest()->paginate(25);
      return view('customer.index', compact('customers'))
                ->with('i', (request()->input('page',1) -1)*25);
                }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'phone' => 'required'
      ]);

      Customer::create($request->all());
      return redirect()->route('customer.index')
                      ->with('success', 'new Customer created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $customer = Customer::find($id);

      return view('customer.detail', compact('customer'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $customer = Customer::find($id);
      return view('customer.edit', compact('customer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'phone' => 'required'
      ]);

      $customer = Customer::find($id);
      $customer->fname = $request->get('fname');
      $customer->lname = $request->get('lname');
      $customer->address = $request->get('address');
      $customer->phone = $request->get('phone');
      $customer->save();
      return redirect()->route('customer.index')
                      ->with('success', 'Customer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::find($id);
      $customer->delete();
      return redirect()->route('customer.index')
                      ->with('success', 'customer deleted successfully');
     }
}
