<?php

namespace App\Http\Controllers;

use App\Models\Koli_custom_field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KoliCustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koli_custom_field = Koli_custom_field::all();

        return response()->json([
            'data' => $koli_custom_field
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
        $koli_custom_field = Koli_custom_field::create([
            'koli_id' => $request->koli_id,
            'awb_sicepat' => $request->awb_sicepat,
            'harga_barang' => $request->harga_barang
        ]);

        return response()->json([
            'message' => 'Koli Custom Field Created',
            'data' => $koli_custom_field
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Koli_custom_field $koli_custom_field)
    {
        return response()->json([
            'data' => $koli_custom_field
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koli_custom_field $koli_custom_field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Koli_custom_field $koli_custom_field)
    {
        $koli_custom_field->koli_id = $request->koli_id;
        $koli_custom_field->awb_sicepat = $request->awb_sicepat;
        $koli_custom_field->harga_barang = $request->harga_barang;

        $koli_custom_field->save();

        return response()->json([
            'message' => 'Koli Custom Field Edited',
            'data' => $koli_custom_field
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koli_custom_field $koli_custom_field)
    {
        $koli_custom_field->delete();

        return response()->json([
            'message' => 'Koli Custom Field Deleted'
        ], 204);
    }
}
