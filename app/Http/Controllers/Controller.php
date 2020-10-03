<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function logout(Request $request)
    {
        // Cambiar estado del especialista
        DB::table('specialists')->where('user_id', Auth::user()->id)
                ->update(['status' => 0]);

        Auth::logout();

        return redirect()->route('voyager.login');
    }
}
