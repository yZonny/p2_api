<?php
namespace App\Repositories;
use App\Models\Usuario;

class UserRepository
{
    public function get()
    {
        return Usuario::all();
    }

    public function find($id)
    {
        return Usuario::find($id);
    }

    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function update($id, array $data)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->update($data);
            return $usuario;
        }
        return null;
    }

    public function delete($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            return $usuario->delete();
        }
        return false;
    }
    public function reviews($userId)
    {
        $usuario = Usuario::with('review')->find($userId);
        if ($usuario) {
            return $usuario->review;
        }
        return null;
    }
}
