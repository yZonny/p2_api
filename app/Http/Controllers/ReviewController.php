<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewServices;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewServices $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get(Request $request)
    {
        $reviews = $this->reviewService->get($request->all());
        return ReviewResource::collection($reviews);
    }

    public function store(ReviewStoreRequest $request)
    {
        $review = $this->reviewService->store($request->validated());
        return new ReviewResource($review);
    }

    public function details($id)
    {
        $review = $this->reviewService->find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        return new ReviewResource($review);
    }

    public function update(ReviewUpdateRequest $request, $id)
    {
        $review = $this->reviewService->update($id, $request->validated());

        if (!$review) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        return new ReviewResource($review);
    }

    public function delete($id)
    {
        $deleted = $this->reviewService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        return response()->json(['message' => 'Review deletada com sucesso.'], 204);
    }
    public function findByUser($userId)
    {
        $reviews = $this->reviewService->findByUser($userId);
        return ReviewResource::collection($reviews);
    }
    public function findByBook($bookId)
    {
        $reviews = $this->reviewService->findByBook($bookId);
        return ReviewResource::collection($reviews);
    }
}