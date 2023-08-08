<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Reflector;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $customer = Customer::orderBy('created_at' , 'desc')->get();

        if (!is_null($request->get('name'))) {
            $customer = $customer->where('name', $request->input('name'));
        }

        if (!is_null($request->get('email'))) {
            $customer = $customer->where('email', $request->input('email'));
        }

        $success = session('success');
        return view('Customer.index' , compact('customer' , 'success'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $customer = Customer::create($request->all());
        return redirect()->route('customers.index')->with('success' , 'customer created successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('Customer.edit ' , compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success' , 'customer updated successfuly');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
        ->with('success' , 'customer deleted successfuly');
    }


    public function Trashed(){
        // dd('hhhhh');
        $customer = Customer::onlyTrashed()->latest('deleted_at')->get();

        return view('Customer.trashed' ,compact('customer'));
    }


    public function restore($id) {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()
        ->route('customers.index')
        ->with('success' , "customer  ({$customer->name}) restored");

    }

    public function  forceDelete($id){
            $customer = Customer::onlyTrashed()->findOrFail($id);
            $customer->forceDelete();

            return redirect()
        ->route('customers.trashed')
        ->with('success' , "customer  ({$customer->name}) deleted forever");
    }
}