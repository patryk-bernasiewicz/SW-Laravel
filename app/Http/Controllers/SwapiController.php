<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SWCharacter;

use App\Helpers\SWApiHelper;

class SwapiController extends Controller
{
    private $_sleep = 50;

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

        // Clear table before inserting updated data
        SWCharacter::truncate();

        try {
            $characters = SWApiHelper::updateCharacters();
            $count = count($characters);
        } catch (Error $e) {
            return ['message' => 'Can\'t load data at the time. Try again later.'];
        }

        return ['message' => $count . ' character records re-added successfully!'];
    }
}
