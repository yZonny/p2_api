<?php
namespace App\Services;
use App\Repositories\UserRepository;
use App\Models\Usuario;

class UsuarioService
{
    private UserRepository $usuarioRepository;

    public function __construct(UserRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function get()
    {
        return $this->usuarioRepository->get();
    }

    public function details(int $id)
    {
        return $this->usuarioRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $usuario = $this->usuarioRepository->find($id);
        if ($usuario && method_exists($usuario, 'reviews')) {
            foreach ($usuario->reviews as $review) {
                $review->delete();
            }
        }
        return $this->usuarioRepository->delete($id);
    }

    public function reviews($id)
    {
        return $this->usuarioRepository->reviews($id);
    }

}
