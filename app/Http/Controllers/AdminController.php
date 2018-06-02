<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Retrieve message for the given name.
     *
     * @param  Request $request
     * @param  string  $name
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $content = ['Area restrita'];

        return response()->json($content, 200);
    }
}
