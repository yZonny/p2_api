<?php
namespace App\Repositories;
use App\Models\Review;

class ReviewRepository
{
    public function get()
    {
        return Review::all();
    }

    public function details($id)
    {
        return Review::findOrFail($id);
    }

    public function store(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = Review::find($id);
        if ($review) {
            $review->update($data);
            return $review;
        }
        return null;
    }

    public function delete($id)
    {
        $review = Review::find($id);
        if ($review) {
            return $review->delete();
        }
        return false;
    }

    // Buscar reviews por usuário
    public function findByUser($userId)
    {
        return Review::where('usuario_id', $userId)->get();
    }

    // Buscar reviews por livro
    public function findByBook($bookId)
    {
        return Review::where('livro_id', $bookId)->get();
    }

}