<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
class CountriesController extends Controller
{
    function index() {
        return view('index');
    }

    function store() {
        $validator = \Validator::make(request()->all(), [
            'country_name' => 'required|unique:countries,country_name',
            'capital_city' => 'required|unique:countries,capital_city',
        ]);

        if ($validator->passes()) {
            $country = new Country;
            $country->country_name = request('country_name');
            $country->capital_city = request('capital_city');

            $saved = $country->save();

            if ($saved) {
                return response()->json(['status' => 1, 'message' => 'Country created successfully!']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->toArray()]);
        }
    }

    function getCountries() {
        $countries = Country::all()->sortByDesc('country_name');
        // return $counties;
        return DataTables::of($countries)->addIndexColumn()->make(true);
    }
}
