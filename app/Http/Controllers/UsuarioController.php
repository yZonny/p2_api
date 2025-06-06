<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Resources\UsuarioResource;
use App\Services\UsuarioService;
use Illuminate\Http\Request;



class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function get()
    {
        $usuarios = $this->usuarioService->get();
        return UsuarioResource::collection($usuarios);
    }

    public function store(UsuarioStoreRequest $request)
    {
        $usuario = $this->usuarioService->store($request->validated());
        return new UsuarioResource($usuario);
    }

    public function details($id)
    {
        $usuario = $this->usuarioService->details($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        return new UsuarioResource($usuario);
    }

    public function update(UsuarioUpdateRequest $request, $id)
    {
        $usuario = $this->usuarioService->update($id, $request->validated());
        if (!$usuario) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        return new UsuarioResource($usuario);
    }

    public function delete($id)
    {
        $deleted = $this->usuarioService->delete($id);
        if (!$deleted) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        return response()->json(['message' => 'Usuario removido com sucesso']);
    }
    public function reviews($id)
    {
        $reviews = $this->usuarioService->reviews($id);
        return response()->json($reviews);
    }
}