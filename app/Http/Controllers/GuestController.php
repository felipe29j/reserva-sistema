<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json(Guest::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'cell' => 'nullable|string',
            'document_type' => 'required|string',
            'document_number' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $guest = Guest::create($request->all());
        return response()->json($guest, 201);
    }

    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return response()->json($guest);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'nullable|exists:hotels,id',
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
            'phone' => 'nullable|string',
            'cell' => 'nullable|string',
            'document_type' => 'sometimes|required|string',
            'document_number' => 'sometimes|required|string',
            'address' => 'nullable|string',
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());
        return response()->json($guest);
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return response()->json(null, 204);
    }
}
