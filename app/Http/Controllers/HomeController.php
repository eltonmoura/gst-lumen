<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $name = $request->input('name', 'ninguém');
        $content = ['Hello ' . $name];

        return response()->json($content, 200);
    }
}
