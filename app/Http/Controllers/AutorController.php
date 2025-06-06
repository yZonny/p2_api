<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use App\Http\Resources\AutorResource;
use App\Services\AutorServices;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class AutorController extends Controller
{
    protected $autorService;

    public function __construct(AutorServices $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        $autores = $this->autorService->get();
        return AutorResource::collection($autores);
    }

    public function store(AutorStoreRequest $request)
    {
        $autor = $this->autorService->store($request->validated());
        return new AutorResource($autor);
    }

    public function details($id)
    {
        $autor = $this->autorService->details($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json($autor);
    }

    public function update(AutorUpdateRequest $request, $id)
    {
        $autor = $this->autorService->update($id, $request->validated());
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return new AutorResource($autor);
    }

    public function delete($id)
    {
        $deleted = $this->autorService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json(['message' => 'Autor removido com sucesso']);
    }
    public function getLivros($autorId)
    {
        $livros = $this->autorService->getLivros($autorId);
        if (!$livros) {
            return response()->json(['message' => 'Autor não encontrado ou sem livros'], 404);
        }
        return response()->json($livros);
    }
    public function getAutoresComLivros()
    {
        $autores = $this->autorService->getAutoresComLivros();
        return response()->json($autores);
    }
}