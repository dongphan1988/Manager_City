<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function filterByCity(Request $request){
        $cities = City::all();
       $city_id = $request->city_id;
       $cityFilter = City::find($city_id);
       $customers = Customer::where('city_id',$city_id)->get();
       $totalCustomerFilter = count($customers);

        return view('customers.index', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }
    public function index()
    {
        $cities = City::all();

        $customers =Customer::all();
        return view('customers.index', compact('customers','cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customers.create',compact('cities'));
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $customer->image = $path;
        }
        $customer->save();
        return redirect()->route('customers.create');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $cities = City::all();
        $customer = Customer::find($id);
        return view('customers.update', compact('customer','cities'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $customer->image = $path;
        }
        $customer->save();
        return redirect()->route('customers.index');
    }
}
