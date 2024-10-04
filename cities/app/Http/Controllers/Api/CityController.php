<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:cities,name',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        $city = City::create($validatedData);

        return response()->json(['message' => 'Город успешно добавлен', 'city' => $city], 201);
    }

    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(['message' => 'Город успешно удален'], 204);
    }
}
