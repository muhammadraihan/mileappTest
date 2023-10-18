<?php

namespace App\Http\Controllers;

use App\Models\Koli_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KoliDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koli_data = Koli_data::all();

        return response()->json([
            'data' => $koli_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'koli_length' => 'required|numeric',
            'awb_url' => 'required|min:5',
            'koli_chargeable_weight' => 'required|numeric',
            'koli_width' => 'required|numeric',
            'koli_height' => 'required|numeric',
            'koli_description' => 'required|string|min:5|max:200',
            'connote_id' => 'required',
            'koli_volume' => 'required|numeric',
            'koli_weight' => 'required|numeric',
            'koli_id' => 'required',
            'koli_code' => 'required|min:10'
        ];

        $messages = [
            '*.required' => ' :attribute tidak boleh kosong !!',
            '*.min' => ' :attribute tidak boleh kurang dari :min karakter !!',
            '*.max' => ' :attribute tidak boleh lebih dari :max karakter !!',
            '*.string' => ':attribute harus berupa karakter dan tidak mengandung angka !!',
            '*.numeric' => ' :attribute harus berupa angka dan tidak mengandung karakter !!',
            '*.gte' => ' :attribute inputan harus lebih besar atau sama dengan 0 !!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $koli_surcharge = json_encode($request->koli_surcharge);
        $koli_data = Koli_data::create([
            'koli_length' => $request->koli_length,
            'awb_url' => $request->awb_url,
            'koli_chargeable_weight' => $request->koli_chargeable_weight,
            'koli_width' => $request->koli_width,
            'koli_surcharge' => $koli_surcharge,
            'koli_height' => $request->koli_height,
            'koli_description' => $request->koli_description,
            'koli_formula_id' => $request->koli_formula_id,
            'connote_id' => $request->connote_id,
            'koli_volume' => $request->koli_volume,
            'koli_weight' => $request->koli_weight,
            'koli_id' => $request->koli_id,
            'koli_code' => $request->koli_code
        ]);

        return response()->json([
            'message' => 'Koli Data Created',
            'data' => $koli_data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Koli_data $koli_data)
    {
        $koli = Koli_data::with('koliCustomField')->find($koli_data->id);

        return response()->json([
            'data' => $koli
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koli_data $koli_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Koli_data $koli_data)
    {
        $rules = [
            'koli_length' => 'required|numeric',
            'awb_url' => 'required|min:5',
            'koli_chargeable_weight' => 'required|numeric',
            'koli_width' => 'required|numeric',
            'koli_height' => 'required|numeric',
            'koli_description' => 'required|string|min:5|max:200',
            'connote_id' => 'required',
            'koli_volume' => 'required|numeric',
            'koli_weight' => 'required|numeric',
            'koli_id' => 'required',
            'koli_code' => 'required|min:10'
        ];

        $messages = [
            '*.required' => ' :attribute tidak boleh kosong !!',
            '*.min' => ' :attribute tidak boleh kurang dari :min karakter !!',
            '*.max' => ' :attribute tidak boleh lebih dari :max karakter !!',
            '*.string' => ':attribute harus berupa karakter dan tidak mengandung angka !!',
            '*.numeric' => ' :attribute harus berupa angka dan tidak mengandung karakter !!',
            '*.gte' => ' :attribute inputan harus lebih besar atau sama dengan 0 !!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $koli_data->koli_length = $request->koli_length;
        $koli_data->awb_url = $request->awb_url;
        $koli_data->koli_chargeable_weight = $request->koli_chargeable_weight;
        $koli_data->koli_width = $request->koli_width;
        $koli_data->koli_surcharge = $request->koli_surcharge;
        $koli_data->koli_height = $request->koli_height;
        $koli_data->koli_description = $request->koli_description;
        $koli_data->koli_formula_id = $request->koli_formula_id;
        $koli_data->connote_id = $request->connote_id;
        $koli_data->koli_volume = $request->koli_volume;
        $koli_data->koli_weight = $request->koli_weight;
        $koli_data->koli_id = $request->koli_id;
        $koli_data->koli_code = $request->koli_code;

        $koli_data->save();

        return response()->json([
            'message' => 'Koli Data Edited',
            'data' => $koli_data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koli_data $koli_data)
    {
        $koli_data->delete();

        return response()->json([
            'message' => 'Koli Data Deleted'
        ], 204);
    }
}
