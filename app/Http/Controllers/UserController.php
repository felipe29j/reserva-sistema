<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:admin')->only(['store', 'update']); // Middleware customizado
    }

    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'nullable|exists:hotels,id',
            'role' => 'required|string|in:master,admin,receptionist',
            'name' => 'required|string',
            'login' => 'required|string|unique:users,login',
            'status' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'hotel_id' => $request->hotel_id,
            'role' => $request->role,
            'name' => $request->name,
            'login' => $request->login,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'nullable|exists:hotels,id',
            'role' => 'sometimes|required|string|in:master,admin,receptionist',
            'name' => 'sometimes|required|string',
            'login' => 'sometimes|required|string|unique:users,login,' . $id,
            'status' => 'sometimes|required|string',
            'password' => 'sometimes|required|string',
        ]);

        $user = User::findOrFail($id);
        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
