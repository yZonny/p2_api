<?php

namespace App\Services;

use App\Models\Genero;
use App\Repositories\GeneroRepository;


class GeneroServices
{
    private GeneroRepository $GeneroRepository;

    public function __construct(GeneroRepository $GeneroRepository)
    {
        $this->GeneroRepository = $GeneroRepository;
    }

    public function get()
    {
        return $this->GeneroRepository->get();
    }

    public function details(int $id)
    {
        return $this->GeneroRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->GeneroRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->GeneroRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $Genero = $this->GeneroRepository->details($id);
        if ($Genero) {
            foreach ($Genero->livros as $livro) {
            $livro->genero_id = null;
            $livro->save();
            }
        }
        return $this->GeneroRepository->delete($id);
    }

    public function Livros($id)
    {
        return $this->GeneroRepository->Livros($id);
    }
    public function getWithLivros()
    {
        return $this->GeneroRepository->getWithLivros();
    }
}