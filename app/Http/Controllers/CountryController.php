<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Country :: all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        $country = new Country;
        $country->name = $request->name;
        // $country->name = $request->input('País'); Otra forma de acceder a la info
        $country->save();
        return $country;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        return $country;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $country->name = $request->name;
        $country->update();
        return $country;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    // public function destroy(country $country)
    // {
    //     $country->delete();
    //     return [];
    // }
    public function destroy($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return response()->json('No se pudo realizar correctamente la operacion',404);
        }
        $country->delete();
        return response()->noContent();
    }
}