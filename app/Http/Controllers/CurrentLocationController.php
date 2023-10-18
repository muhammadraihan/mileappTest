<?php

namespace App\Http\Controllers;

use App\Models\Current_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CurrentLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_location = Current_location::all();

        return response()->json($current_location);
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
            'name' => 'required|string|min:3|max:100',
            'code' => 'required|min:3|max:10',
            'type' => 'required|string|min:3|max:20',
            'transaction_id' => 'required'
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

        $current_location = Current_location::create([
            'transaction_id' => $request->transaction_id,
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type
        ]);

        return response()->json([
            'message' => 'Current Location Created',
            'data' => $current_location
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Current_location $current_location)
    {
        return response()->json($current_location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Current_location $current_location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Current_location $current_location)
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'code' => 'required|min:3|max:10',
            'type' => 'required|string|min:3|max:20',
            'transaction_id' => 'required'
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

        $current_location->transaction_id = $request->transaction_id;
        $current_location->name = $request->name;
        $current_location->code = $request->code;
        $current_location->type = $request->type;

        $current_location->save();

        return response()->json([
            'message' => 'Current Location Edited',
            'data' => $current_location
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Current_location $current_location)
    {
        $current_location->delete();

        return response()->json([
            'message' => 'Current Location Delete'
        ],204);
    }
}
