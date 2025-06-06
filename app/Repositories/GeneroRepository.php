<?php
namespace App\Repositories;
use App\Models\Genero;

class GeneroRepository
{
    public function get()
    {
        return Genero::all();
    }

    public function details($id)
    {
        return Genero::findOrFail($id);
    }

    public function store(array $data)
    {
        return Genero::create($data);
    }

    public function update(int $id, array $data)
    {
        $genero = $this->details($id);
        $genero->update($data);
        return $genero;
    }

    public function delete(int $id)
    {
        $genero = $this->details($id);
        $genero->delete();
        return $genero;
    }
    public function livros(int $generoId)
    {
        return Genero::with('livros')->find($generoId);
    }
    
    public function getWithLivros()
    {
        return Genero::with('livros')->get();
    }
}