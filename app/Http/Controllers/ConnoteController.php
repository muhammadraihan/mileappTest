<?php

namespace App\Http\Controllers;

use App\Models\Connote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ConnoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $connote = Connote::all();
        return response()->json([
            'data' => $connote
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
            'connote_id' => 'required',
            'connote_number' => 'required|numeric',
            'connote_service' => 'required|string',
            'connote_service_price' => 'required|numeric',
            'connote_amount' => 'required|numeric',
            'connote_code' => 'required|max:50',
            'connote_order' => 'required|numeric',
            'connote_state' => 'required|string|max:10',
            'connote_state_id' => 'required|numeric',
            'zone_code_from' => 'required|string|max:10',
            'zone_code_to' => 'required|string|max:10',
            'transaction_id' => 'required',
            'actual_weight' => 'required|numeric',
            'volume_weight' => 'required|numeric',
            'chargeable_weight' => 'required|numeric',
            'organization_id' => 'required|numeric',
            'location_id' => 'required',
            'connote_total_package' => 'required|numeric',
            'connote_surcharge_amount' => 'required|numeric',
            'connote_sla_day' => 'required|numeric',
            'location_name' => 'required|string|min:5|max:50',
            'location_type' => 'required|string|max:10',
            'source_tariff_db' => 'required|string|min:5|max:100',
            'id_source_tariff' => 'required|numeric',
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

        $history = json_encode($request->history);
        $connote = Connote::create([
            'connote_id' => $request->connote_id,
            'connote_number' => $request->connote_number,
            'connote_service' => $request->connote_service,
            'connote_service_price' => $request->connote_service_price,
            'connote_amount' => $request->connote_amount,
            'connote_code' => $request->connote_code,
            'connote_booking_code' => $request->connote_booking_code,
            'connote_order' => $request->connote_order,
            'connote_state' => $request->connote_state,
            'connote_state_id' => $request->connote_state_id,
            'zone_code_from' => $request->zone_code_from,
            'zone_code_to' => $request->zone_code_to,
            'surcharge_amount' => $request->surcharge_amout,
            'transaction_id' => $request->transaction_id,
            'actual_weight' => $request->actual_weight,
            'volume_weight' => $request->volume_weight,
            'chargeable_weight' => $request->chargeable_weight,
            'organization_id' => $request->organization_id,
            'location_id' => $request->location_id,
            'connote_total_package' => $request->connote_total_package,
            'connote_surcharge_amount' => $request->connote_surcharge_amount,
            'connote_sla_day' => $request->connote_sla_day,
            'location_name' => $request->location_name,
            'location_type' => $request->location_type,
            'source_tariff_db' => $request->source_tariff_db,
            'id_source_tariff' => $request->id_source_tariff,
            'pod' => $request->pod,
            'history' => $history
        ]);

        return response()->json([
            'message' => 'Connote Created',
            'data' => $connote
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Connote $connote)
    {
        return response()->json([
            'data' => $connote
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Connote $connote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Connote $connote)
    {
        $rules = [
            'connote_id' => 'required',
            'connote_number' => 'required|numeric',
            'connote_service' => 'required|string',
            'connote_service_price' => 'required|numeric',
            'connote_amount' => 'required|numeric',
            'connote_code' => 'required|max:50',
            'connote_order' => 'required|numeric',
            'connote_state' => 'required|string|max:10',
            'connote_state_id' => 'required|numeric',
            'zone_code_from' => 'required|string|max:10',
            'zone_code_to' => 'required|string|max:10',
            'transaction_id' => 'required',
            'actual_weight' => 'required|numeric',
            'volume_weight' => 'required|numeric',
            'chargeable_weight' => 'required|numeric',
            'organization_id' => 'required|numeric',
            'location_id' => 'required',
            'connote_total_package' => 'required|numeric',
            'connote_surcharge_amount' => 'required|numeric',
            'connote_sla_day' => 'required|numeric',
            'location_name' => 'required|string|min:5|max:50',
            'location_type' => 'required|string|max:10',
            'source_tariff_db' => 'required|string|min:5|max:100',
            'id_source_tariff' => 'required|numeric',
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

        $history = json_encode($request->history);

        $connote->connote_id = $request->connote_id;
        $connote->connote_number = $request->connote_number;
        $connote->connote_service = $request->connote_service;
        $connote->connote_service_price = $request->connote_service_price;
        $connote->connote_amount = $request->connote_amount;
        $connote->connote_code = $request->connote_code;
        $connote->connote_booking_code = $request->connote_booking_code;
        $connote->connote_order = $request->connote_order;
        $connote->connote_state = $request->connote_state;
        $connote->connote_state_id = $request->connote_state_id;
        $connote->zone_code_from = $request->zone_code_from;
        $connote->zone_code_to = $request->zone_code_to;
        $connote->surcharge_amount = $request->surcharge_amount;
        $connote->transaction_id = $request->transaction_id;
        $connote->actual_weight = $request->actual_weight;
        $connote->volume_weight = $request->volume_weight;
        $connote->chargeable_weight = $request->chargeable_weight;
        $connote->organization_id = $request->organization_id;
        $connote->location_id = $request->location_id;
        $connote->connote_total_package = $request->connote_total_package;
        $connote->connote_surcharge_amount = $request->connote_surcharge_amount;
        $connote->connote_sla_day = $request->connote_sla_day;
        $connote->location_name = $request->location_name;
        $connote->location_type = $request->location_type;
        $connote->source_tariff_db = $request->source_tariff_db;
        $connote->id_source_tariff = $request->id_source_tariff;
        $connote->pod = $request->pod;
        $connote->history = $history;

        $connote->save();

        return response()->json([
            'message' => 'Connote Edited',
            'data' => $connote
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connote $connote)
    {
        $connote->delete();

        return response()->json([
            'message' => 'Connote Deleted'
        ], 204);
    }
}
