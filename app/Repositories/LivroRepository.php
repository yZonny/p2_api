<?php
namespace App\Repositories;
use App\Models\Livro;

class LivroRepository
{
    public function get()
    {
        return Livro::all();
    }

    public function details(int $id)
    {
        return Livro::findOrFail($id);
    }

    public function store(array $data)
    {
        return Livro::create($data);
    }

    public function update(int $id, array $data)
    {
        $Livro = $this->details($id);
        $Livro->update($data);
        return $Livro;
    }

    public function delete(int $id)
    {
        $Livro = $this->details($id);
        $Livro->delete();
        return $Livro;
    }
    public function listarReviews(int $livroId)
    {
        return Livro::with(['review'])->find($livroId)->review;
    }
    public function listarLivrosComReviewsAutorGenero()
    {
        return Livro::with(['review', 'autor', 'genero'])->get();
    }
}
