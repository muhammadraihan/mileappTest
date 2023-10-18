<?php

namespace App\Http\Controllers;

use App\Models\Custom_field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custom_field = Custom_field::all();

        return response()->json($custom_field);
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
            'transaction_id' => 'required|numeric',
            'catatan_tambahan' => 'required|min:5|max:200'
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

        $custom_field = Custom_field::create([
            'transaction_id' => $request->transaction_id,
            'catatan_tambahan' => $request->catatan_tambahan
        ]);

        return response()->json([
            'message' => 'Custom Field Created',
            'data' => $custom_field
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Custom_field $custom_field)
    {
        return response()->json([
            'data' => $custom_field
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Custom_field $custom_field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Custom_field $custom_field)
    {
        $rules = [
            'transaction_id' => 'required|numeric',
            'catatan_tambahan' => 'required|min:5|max:200'
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

        $custom_field->transaction_id = $request->transaction_id;
        $custom_field->catatan_tambahan = $request->catatan_tambahan;

        $custom_field->save();

        return response()->json([
            'message' => 'Custom Field Edited',
            'data' => $custom_field
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Custom_field $custom_field)
    {
        $custom_field->delete();

        return response()->json([
            'message' => 'Custom Field Deleted'
        ], 204);
    }
}
