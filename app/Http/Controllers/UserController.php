<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Log;

/**
 * Classe que implementa o CRUDL de Usuários
 */
class UserController extends Controller
{
    /**
     * Cria um novo Usuário
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $postData = $request->json()->all();

        Log::info('Criando um usuáro', $postData);

        $user = new User();
        $user->name = $postData['name'];
        $user->email = $postData['email'];
        $user->password = User::encrypt($postData['password']);

        $results = $user->save();

        return response()->json($results, 200);
    }

    /**
     * Retorna um Usuário identificado pelo seu Id
     *
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function read(Request $request, $id)
    {
        Log::info('Exibindo o usuáro', $id);

        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    /**
     * Edita um Usuário identificado pelo seu Id
     *
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $postData = $request->json()->all();
        $user = User::findOrFail($id);
        $userBefore = clone $user;

        if (isset($postData['name'])) {
            $user->name = $postData['name'];
        }
        if (isset($postData['email'])) {
            $user->email = $postData['email'];
        }
        if (isset($postData['password'])) {
            $user->password = User::encrypt($postData['password']);
        }

        Log::info('Editando o Usuário', ["de" => $userBefore, "para" => $user]);

        $results = $user->save();

        return response()->json($user, 200);
    }

    /**
     * Remove um Usuário identificado pelo seu Id
     *
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Log::info('Removendo um Usuário', $user);

        $response = $user->delete();
        return response()->json($response, 200);
    }

    /**
     * Lista os Usuários existentes
     *
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {
        Log::info('Listando os Usuários');

        return response()->json(User::all(), 200);
    }
}
