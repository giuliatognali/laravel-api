<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'success'=> true,
            'results' => $types
        ]);
    }
    public function show(string $slug){
        $type = Type::where('slug', $slug)->with('projects')->first();
        return response()->json([
            'success'=> true,
            'results' => $type
        ]);
    }
}
