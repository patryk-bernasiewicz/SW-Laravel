<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Givebutter\LaravelKeyable\Models\ApiKey;

class DashboardController extends Controller
{
    public function index() {
        $currentUser = Auth::user();
        $user_token = ApiKey::select('key')
            ->where('keyable_type', 'App\Models\User')
            ->where('keyable_id', $currentUser->id)
            ->first();

        return view('dashboard.index')->with('user_token', ($user_token->key ?? null));
    }

    public function generate_api_key() {
        $currentUser = Auth::user();

        $user_token = ApiKey::select('key')
            ->where('keyable_type', 'App\Models\User')
            ->where('keyable_id', $currentUser->id)
            ->first();

        if (!empty($user_token->key)) {
            return redirect('/dashboard')->with('message', 'You\'ve already been assigned a key.');
        }

        $new_key = new ApiKey();
        $new_key->keyable_type = 'App\Models\User';
        $new_key->keyable_id = $currentUser->id;
        $new_key->key = ApiKey::generate();
        $new_key->save();

        return redirect('/dashboard');
    }
}
