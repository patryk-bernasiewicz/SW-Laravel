<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SWCharacter;

class CharacterController extends Controller
{
    public function findByName(Request $request) {
        $name = $request->input('name');
        return SWCharacter::where('name', 'LIKE', '%' . $name . '%')->first();
    }
}
