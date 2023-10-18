<?php

namespace App\Http\Controllers;

use App\Models\Origin_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OriginDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $origin_data = Origin_data::all();

        return response()->json([
            'data' => $origin_data
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
            'customer_name' => 'required|string|min:3|max:100',
            'customer_address' => 'required|string|min:3|max:200',
            'customer_email' => 'required|email|min:3|max:50',
            'customer_phone' => 'required|numeric|min:3|max:20',
            'customer_zip_code' => 'required|numeric|min:3|max:7',
            'zone_code' => 'required|string|min:3|max:10',
            'organization_id' => 'required|numeric',
            'location_id' => 'required'
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

        $origin_data = Origin_data::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address_detail' => $request->customer_address_detail,
            'customer_zip_code' => $request->customer_zip_code,
            'zone_code' => $request->zone_code,
            'organization_id' => $request->organization_id,
            'location_id' => $request->location_id
        ]);

        return response()->json([
            'message' => 'Origin Data Created',
            'data' => $origin_data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Origin_data $origin_data)
    {
        return response()->json([
            'data' => $origin_data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Origin_data $origin_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Origin_data $origin_data)
    {
        $rules = [
            'customer_name' => 'required|string|min:3|max:100',
            'customer_address' => 'required|string|min:3|max:200',
            'customer_email' => 'required|email|min:3|max:50',
            'customer_phone' => 'required|numeric|min:3|max:20',
            'customer_zip_code' => 'required|numeric|min:3|max:7',
            'zone_code' => 'required|string|min:3|max:10',
            'organization_id' => 'required|numeric',
            'location_id' => 'required'
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

        $origin_data->customer_name = $request->customer_name;
        $origin_data->customer_address = $request->customer_address;
        $origin_data->customer_email = $request->customer_email;
        $origin_data->customer_phone = $request->customer_phone;
        $origin_data->customer_address_detail = $request->customer_address_detail;
        $origin_data->customer_zip_code = $request->customer_zip_code;
        $origin_data->zone_code = $request->zone_code;
        $origin_data->organization_id = $request->organization_id;
        $origin_data->location_id = $request->location_id;

        $origin_data->save();

        return response()->json([
            'message' => 'Origin Data Edited',
            'data' => $origin_data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin_data $origin_data)
    {
        $origin_data->delete();

        return response()->json([
            'message' => 'Origin Data Deleted'
        ], 204);
    }
}
