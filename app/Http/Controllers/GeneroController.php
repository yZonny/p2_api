<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneroStoreRequest;
use App\Http\Requests\GeneroUpdateRequest;
use App\Http\Resources\GeneroResource;
use App\Services\GeneroServices;
use Illuminate\Http\Request;


class GeneroController extends Controller
{
    protected $generoService;

    public function __construct(GeneroServices $generoService)
    {
        $this->generoService = $generoService;
    }

    public function get()
    {
        $generos = $this->generoService->get();
        return GeneroResource::collection($generos);
    }

    public function store(GeneroStoreRequest $request)
    {
        $genero = $this->generoService->store($request->validated());
        return new GeneroResource($genero);
    }

    public function details($id)
    {
        $genero = $this->generoService->details($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return new GeneroResource($genero);
    }

    public function update(GeneroUpdateRequest $request, $id)
    {
        $genero = $this->generoService->details($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        $genero = $this->generoService->update($id, $request->validated());
        return new GeneroResource($genero);
    }

    public function delete($id)
    {
        $genero = $this->generoService->details($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        $this->generoService->delete($id);
        return response()->json(['message' => 'Genero removido com sucesso']);
    }
    public function livros($id)
    {
        $livros = $this->generoService->Livros($id);
        return response()->json($livros);
    }
    public function getWithLivros()
    {
        $generos = $this->generoService->getWithLivros();
        return GeneroResource::collection($generos);
    }
}