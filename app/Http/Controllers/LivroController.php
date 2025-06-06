<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use App\Services\LivroServices;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroServices $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index()
    {
        $livros = $this->livroService->get();
        return LivroResource::collection($livros);
    }

    public function show($id)
    {
        $livro = $this->livroService->details($id);
        return new LivroResource($livro);
    }

    public function store(LivroStoreRequest $request)
    {
        $livro = $this->livroService->store($request->validated());
        return new LivroResource($livro);
    }

    public function update(LivroUpdateRequest $request, $id)
    {
        $livro = $this->livroService->update($id, $request->validated());
        return new LivroResource($livro);
    }

    public function destroy($id)
    {
        $this->livroService->delete($id);
        return response()->json(['message' => 'Livro removido com sucesso']);
    }
    public function listarReviews($id)
    {
        $reviews = $this->livroService->listarReviews($id);
        return response()->json($reviews);
    }
    public function listarLivrosComReviewsAutorGenero()
    {
        $livros = $this->livroService->listarLivrosComReviewsAutorGenero();
        return response()->json($livros);
    }

}
