<?php
namespace App\Services;
use App\Repositories\AutorRepository;
use App\Models\Autor;

class AutorServices
{
    private AutorRepository $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function get()
    {
        return $this->autorRepository->get();
    }

    public function details(int $id)
    {
        return $this->autorRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->autorRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $autor = $this->autorRepository->details($id);
        if ($autor) {
            foreach ($autor->livros as $livro) {
                $livro->delete();
            }
        }
        return $this->autorRepository->delete($id);
    }

    public function getLivros($id)
    {
        return $this->autorRepository->getLivros($id);
    }
    public function getAutoresComLivros()
    {
        return $this->autorRepository->getAutoresComLivros();
    }
}
