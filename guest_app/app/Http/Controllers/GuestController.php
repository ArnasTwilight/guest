<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Http\Resources\Guest\GuestResource;
use App\Models\Guest;
use Propaganistas\LaravelPhone\PhoneNumber;
use function PHPUnit\Framework\returnArgument;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::query()->paginate(10);
        return GuestResource::collection($guest);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (empty($data['country'])) {
            $data['country'] = (new PhoneNumber($data['phone']))->getCountry();
        }

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
            'data' => [
                'message' => 'Deleted successfully'
            ]
        ]);
    }
}
