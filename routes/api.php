<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;

// Rota de usuário autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'index');             // Listar todos os livros
    Route::get('/livros/{id}', 'show');         // Detalhar um livro
    Route::post('/livros', 'store');            // Criar um novo livro
    Route::put('/livros/{id}', 'update');       // Atualizar um livro (pode trocar por patch se quiser)
    Route::delete('/livros/{id}', 'destroy');   // Deletar um livro
    Route::get('/livros-reviews/{id}', 'listarReviews');                 // Listar todas as reviews
    Route::get('/livros-detalhado', 'listarLivrosComReviewsAutorGenero'); // Livros com reviews, autor e gênero
});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos', 'get');                          // Listar todos os gêneros
    Route::post('/generos', 'store');                       // Criar um novo gênero
    Route::get('/generos/{id}', 'details');                 // Detalhar um gênero
    Route::put('/generos/{id}', 'update');                  // Atualizar um gênero
    Route::delete('/generos/{id}', 'delete');               // Deletar um gênero
    Route::get('/generos-livros/{id}', 'livros');                // Listar todos os livros de todos os gêneros
    Route::get('/generos-com-livros', 'getWithLivros');     // Listar gêneros com seus respectivos livros
});

Route::controller(AutorController::class)->group(function () {
    Route::get('/autores', 'get');                           // Listar todos os autores
    Route::post('/autores', 'store');                        // Criar um novo autor
    Route::get('/autores/{id}', 'details');                  // Detalhar um autor
    Route::put('/autores/{id}', 'update');                   // Atualizar um autor
    Route::delete('/autores/{id}', 'delete');                // Deletar um autor
    Route::get('/autores/{autorId}/livros', 'getLivros');    // Listar livros de um autor específico
    Route::get('/autores-com-livros', 'getAutoresComLivros'); // Listar todos os autores com seus livros
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');                              // Listar todas as reviews
    Route::post('/reviews', 'store');                           // Criar uma nova review
    Route::get('/reviews/{id}', 'details');                     // Detalhar uma review
    Route::put('/reviews/{id}', 'update');                      // Atualizar uma review
    Route::delete('/reviews/{id}', 'delete');                   // Deletar uma review
    Route::get('/reviews/usuario/{userId}', 'findByUser');      // Reviews por usuário
    Route::get('/reviews/livro/{bookId}', 'findByBook');        // Reviews por livro
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'get');                     // Listar todos os usuários
    Route::post('/usuarios', 'store');                  // Criar um novo usuário
    Route::get('/usuarios/{id}', 'details');            // Detalhar um usuário
    Route::put('/usuarios/{id}', 'update');             // Atualizar um usuário
    Route::delete('/usuarios/{id}', 'delete');          // Deletar um usuário
    Route::get('/usuarios-reviews/{id}', 'reviews');         // Listar reviews de todos os usuários
});
