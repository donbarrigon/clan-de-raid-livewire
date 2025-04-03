<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = (int) request('perpage', 10);
        $countries = Country::paginate($perpage);
        return view('dashboard.countries.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCountryRequest $request)
    {
        Country::create($request->validated());
        session()->flash('success','Created');
        return  redirect()->route('dashboard.countries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('dashboard.countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveCountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        session()->flash('success','Updated');
        return redirect()->route('dashboard.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
        session()->flash('success','Deleted');
        return redirect()->route('dashboard.countries.index');
    }
}
