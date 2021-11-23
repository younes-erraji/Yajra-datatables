<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\DataTables\CountriesDataTable;
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
        return DataTables::of($countries)
                ->addIndexColumn()
                ->addColumn('action_update', function ($row) {
                    return '<a href="" data-id="' . $row['id'] . '" class="update-button btn btn-sm btn-primary" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil-square-o"></i></a>';
                })
                ->addColumn('action_delete', function ($row) {
                    return '<a href="" data-id="' . $row['id'] . '" class="delete-button btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                })
                ->rawColumns(['action_update', 'action_delete'])
                ->make(true);
    }

    function update() {
        $country = Country::find(request('cid'));
        $validator = \Validator::make(request()->all(), [
            'country_name' => 'required',
            'capital_city' => 'required',
        ]);

        if ($validator->passes()) {
            $country->country_name = request('country_name');
            $country->capital_city = request('capital_city');
            $saved = $country->save();

            if ($saved) {
                return response()->json(['status' => 1, 'message' => 'Country updated successfully!']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->toArray()]);
        }
    }

    function delete() {
        $country = Country::find(request('country_id'));
        if (isset($country)) {
            $test = $country->delete();
            if ($test) {
                return response()->json(['status' => 1, 'message' => 'Good!']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'This country does not exists!']);
        }
    }

    function getCountryDetails() {
        $country = Country::find(request('country_id'));
        if (isset($country)) {
            return response()->json(['status' => 1, 'details' => $country]);
        } else {
            return response()->json(['status' => 0, 'message' => 'This country does not exists!']);
        }
    }

    function buttons(CountriesDataTable $countriesDataTable) {
        // return view('buttons');
        return $countriesDataTable->render('buttons');
    }
}
