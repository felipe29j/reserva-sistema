<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json(Apartment::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'code' => 'required|string',
            'name' => 'required|string',
        ]);

        $apartment = Apartment::create($request->all());
        return response()->json($apartment, 201);
    }

    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return response()->json($apartment);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'nullable|exists:hotels,id',
            'code' => 'sometimes|required|string',
            'name' => 'sometimes|required|string',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());
        return response()->json($apartment);
    }

    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return response()->json(null, 204);
    }
}
