<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\ReviewRepository;

class ReviewServices
{
    private ReviewRepository $ReviewRepository;

    public function __construct(ReviewRepository $ReviewRepository)
    {
        $this->ReviewRepository = $ReviewRepository;
    }

    public function get()
    {
        return $this->ReviewRepository->get();
    }

    public function find(int $id)
    {
        return $this->ReviewRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->ReviewRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ReviewRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->ReviewRepository->delete($id);
    }

    public function findByUser($id)
    {
        return $this->ReviewRepository->findByUser($id);
    }
    public function findByBook($id)
    {
        return $this->ReviewRepository->findByBook($id);
    }
}