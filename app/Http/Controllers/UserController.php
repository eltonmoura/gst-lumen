<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $postData = $request->json()->all();

        $user = new User();
        $user->name = $postData['name'];
        $user->email = $postData['email'];
        $user->password = User::encrypt($postData['password']);
        $results = $user->save();

        return response()->json($results, 200);
    }

    public function read(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $postData = $request->json()->all();
        $user = User::findOrFail($id);

        if (isset($postData['name'])) {
            $user->name = $postData['name'];
        }
        if (isset($postData['email'])) {
            $user->email = $postData['email'];
        }
        if (isset($postData['password'])) {
            $user->password = User::encrypt($postData['password']);
        }
        $results = $user->save();

        return response()->json($user, 200);
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $response = $user->delete();
        return response()->json($response, 200);
    }

    public function list(Request $request)
    {
        return response()->json(User::all(), 200);
    }
}
