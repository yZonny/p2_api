<?php

namespace App\Services;

use App\Models\Livro;
use App\Repositories\LivroRepository;


class LivroServices
{
    private LivroRepository $LivroRepository;

    public function __construct(LivroRepository $LivroRepository)
    {
        $this->LivroRepository = $LivroRepository;
    }

    public function get()
    {
        return $this->LivroRepository->get();
    }

    public function details(int $id)
    {
        return $this->LivroRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->LivroRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->LivroRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $Livro = $this->LivroRepository->details($id);
        if ($Livro) {
            if (method_exists($Livro, 'reviews')) {
            foreach ($Livro->reviews as $review) {
                $review->delete();
            }
            }
        }
        return $this->LivroRepository->delete($id);
    }

    public function listarReviews(int $id)
    {
        return $this->LivroRepository->listarReviews($id);
    }
    public function listarLivrosComReviewsAutorGenero()
    {
        return $this->LivroRepository->listarLivrosComReviewsAutorGenero();
    }
}