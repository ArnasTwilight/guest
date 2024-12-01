<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\UpdateRequest;
use App\Http\Requests\Guest\StoreRequest;
use App\Http\Resources\Guest\GuestResource;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $user = User::create([
//            'name' => 'Test',
//            'email' => 'test@test.com',
//            'password' => 'password123'
//        ]);
//        return $user;

        $guest = Guest::all();
        return GuestResource::collection($guest);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $guest = Guest::create($data);

        return GuestResource::make($guest);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return GuestResource::make($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Guest $guest)
    {
        $data = $request->validated();
        $guest->update($data);

        return GuestResource::make($guest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
