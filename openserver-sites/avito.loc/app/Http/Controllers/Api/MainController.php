<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{

    public function index(Request $request)
    {
        /** @var User $user */

        /**
         * @OA\Get(
         *     path="/api/data.json",
         *     @OA\Response(
         *         response="200",
         *         description="The data"
         *     )
         * )
         */

        $user = User::find(13);
        return $user->toJson();
    }

    public function register(Request $request){


        $user = User::create([
            'name' => $request->name,
            'email' => time() . $request->email,
            'password' => Hash::make($request->password),
        ]);


        return response()->json(['создан'], 201);
    }













}
