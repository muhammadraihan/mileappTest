<?php

namespace App\Http\Controllers;

use App\Models\Customer_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_attribute = Customer_attribute::all();

        return response()->json([
            'data' => $customer_attribute
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
            'transaction_id' => 'required',
            'nama_sales' => 'required|string|min:3|max:100',
            'top' => 'required|min:3|max:100',
            'jenis_pelanggan' => 'required|min:3|max:100'
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

        $customer_attribute = Customer_attribute::create([
            'transaction_id' => $request->transaction_id,
            'nama_sales' => $request->nama_sales,
            'top' => $request->top,
            'jenis_pelanggan' => $request->jenis_pelanggan
        ]);

        return response()->json([
            'message' => 'Customer Atrribute Created',
            'data' => $customer_attribute
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer_attribute $customer_attribute)
    {
        return response()->json([
            'data' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer_attribute $customer_attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer_attribute $customer_attribute)
    {
        $rules = [
            'transaction_id' => 'required',
            'nama_sales' => 'required|string|min:3|max:100',
            'top' => 'required|min:3|max:100',
            'jenis_pelanggan' => 'required|min:3|max:100'
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

        $customer_attribute->transaction_id = $request->transaction_id;
        $customer_attribute->nama_sales = $request->nama_sales;
        $customer_attribute->top = $request->top;
        $customer_attribute->jenis_pelanggan = $request->jenis_pelanggan;

        $customer_attribute->save();

        return response()->json([
            'message' => 'Customer Attribute Edited',
            'data' => $customer_attribute
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer_attribute $customer_attribute)
    {
        $customer_attribute->delete();

        return response()->json([
            'message' => 'Customer Attribute Deleted'
        ], 204);
    }
}
