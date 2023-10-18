<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();

        return response()->json([
            'data' => $order
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
     * Store a newly created reso urce in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'transaction_id' => 'required',
            'customer_name' => 'required|string|min:5|max:100|',
            'customer_code' => 'required|numeric',
            'transaction_amount' => 'required|numeric',
            'transaction_discount' => 'required|numeric',
            'transaction_payment_type' => 'required|numeric',
            'transaction_state' => 'required',
            'transaction_code' => 'required',
            'transaction_order' => 'required|numeric',
            'location_id' => 'required',
            'organization_id' => 'required|numeric',
            'transaction_payment_type_name' => 'required',
            'transaction_cash_amount' => 'required|numeric',
            'transaction_cash_change' => 'required|numeric',
            'connote_id' => 'required'
        ];

        $messages = [
            '*.required' => ' :attribute tidak boleh kosong !!',
            '*.min' => ' :attribute tidak boleh kurang dari 5 karakter !!',
            '*.max' => ' :attribute tidak boleh lebih dari 200 karakter !!',
            '*.string' => ':attribute harus berupa karakter dan tidak mengandung angka !!',
            '*.numeric' => ' :attribute harus berupa angka dan tidak mengandung karakter !!',
            '*.gte' => ' :attribute inputan harus lebih besar atau sama dengan 0 !!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $order = Order::create([
            'transaction_id' => $request->transaction_id,
            'customer_name' => $request->customer_name,
            'customer_code' => $request->customer_code,
            'transaction_amount' => $request-> transaction_amount,
            'transaction_discount' => $request->transaction_discount,
            'transaction_additional_field' => $request->transaction_additional_field,
            'transaction_payment_type' => $request->transaction_payment_type,
            'transaction_state' => $request->transaction_state,
            'transaction_code' => $request->transaction_code,
            'transaction_order' => $request->transaction_order,
            'location_id' => $request->location_id,
            'organization_id' => $request->organization_id,
            'transaction_payment_type_name' => $request->transaction_payment_type_name,
            'transaction_cash_amount' => $request->transaction_cash_amount,
            'transaction_cash_change' => $request->transaction_cash_change,
            'connote_id' => $request->connote_id,
        ]);

        return response()->json(['message' => 'Order created', 'data' => $order], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $transaction = Order::with(['customerAttribute','connote','originData', 'destinationData', 'koliData', 'koliData.koliCustomField', 'customField', 'currentLocation'])->find($order->id);

        return response()->json([
            'data' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $rules = [
            'transaction_id' => 'required',
            'customer_name' => 'required|string|min:5|max:100|',
            'customer_code' => 'required|numeric',
            'transaction_amount' => 'required|numeric',
            'transaction_discount' => 'required|numeric',
            'transaction_payment_type' => 'required|numeric',
            'transaction_state' => 'required',
            'transaction_code' => 'required',
            'transaction_order' => 'required|numeric',
            'location_id' => 'required',
            'organization_id' => 'required|numeric',
            'transaction_payment_type_name' => 'required',
            'transaction_cash_amount' => 'required|numeric',
            'transaction_cash_change' => 'required|numeric',
            'connote_id' => 'required'
        ];

        $messages = [
            '*.required' => ' :attribute tidak boleh kosong !!',
            '*.min' => ' :attribute tidak boleh kurang dari 5 karakter !!',
            '*.max' => ' :attribute tidak boleh lebih dari 200 karakter !!',
            '*.string' => ':attribute harus berupa karakter dan tidak mengandung angka !!',
            '*.numeric' => ' :attribute harus berupa angka dan tidak mengandung karakter !!',
            '*.gte' => ' :attribute inputan harus lebih besar atau sama dengan 0 !!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $order->transaction_id = $request->transaction_id;
        $order->customer_name = $request->customer_name;
        $order->customer_code = $request->customer_code;
        $order->transaction_amount = $request->transaction_amount;
        $order->transaction_discount = $request->transaction_discount;
        $order->transaction_additional_field = $request->transaction_additional_field;
        $order->transaction_payment_type = $request->transaction_payment_type;
        $order->transaction_state = $request->transaction_state;
        $order->transaction_code = $request->transaction_code;
        $order->transaction_order = $request->transaction_order;
        $order->location_id = $request->location_id;
        $order->organization_id = $request->organization_id;
        $order->transaction_payment_type_name = $request->transaction_payment_type_name;
        $order->transaction_cash_amount = $request->transaction_cash_amount;
        $order->transaction_cash_change = $request->transaction_cash_change;
        $order->connote_id = $request->connote_id;

        $order->save();

        return response()->json([
            'message' => 'Order Edited',
            'data' => $order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'Order Deleted'
        ], 204);
    }
}
