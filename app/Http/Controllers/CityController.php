<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(CityRequest $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->customers()->delete();

        $city->delete();
        return redirect()->route('cities.index');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('cities.update', compact('city'));
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->save();
        return redirect()->route('cities.index');
    }
}
