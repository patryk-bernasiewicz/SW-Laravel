<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\SWCharacter;

class SwapiController extends Controller
{
    function __construct() {
        $this->middleware('permission:swapi-refresh', ['only' => ['index','refresh']]);
    }

    public function index() {
        $characters = SWCharacter::count();

        return view('dashboard.swapi.index', compact('characters'));
    }

    public function refresh(Request $request, Response $response) {
        if (!$request->wantsJson()) {
            return response('You must make an AJAX call.', 400)->header('Content-Type', 'text/plain');
        }

        // Import logic here

        return ['message' => 'Import successful!'];
    }
}
