<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json(Booking::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'apartment_id' => 'required|exists:apartments,id',
            'guest_id' => 'required|exists:guests,id',
            'code' => 'required|string',
            'status' => 'required|string',
            'quantity' => 'required|integer',
            'unit_value' => 'required|numeric',
            'total_value' => 'required|numeric',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
        ]);

        $booking = Booking::create($request->all());
        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'nullable|exists:hotels,id',
            'apartment_id' => 'nullable|exists:apartments,id',
            'guest_id' => 'nullable|exists:guests,id',
            'code' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
            'quantity' => 'sometimes|required|integer',
            'unit_value' => 'sometimes|required|numeric',
            'total_value' => 'sometimes|required|numeric',
            'check_in_date' => 'sometimes|required|date',
            'check_out_date' => 'sometimes|required|date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(null, 204);
    }
}
