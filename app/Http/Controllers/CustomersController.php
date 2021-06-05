<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list(){
        $customers = Customer::all();
        return view('internals.customers', ['customers'=>$customers]);
    	// $activeCustomers = Customer::active->get();
    	// $inactiveCustomers = Customer::inactive->get();
    	// $companies = Comapny::all();

    	// return view('internals.customers', compact('activeCustomers','inactiveCustomers','companies'))
    }
    public function index()
    {
        $data = Customer::latest()->paginate(5);    
        return view('index', compact('data'))
                ->with('i', (request()->input('page',1) -1) * 5);
        // dd('hi');
    }

   
}
