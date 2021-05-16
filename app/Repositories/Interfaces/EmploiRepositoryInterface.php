<?php
namespace App\Repositories\interfaces;

use App\Models\Emploi;

interface EmploiRepositoryInterface{

    public function all();
    public function getById(int $id);
    public function getByName(string $nom);
    public function save(Emploi $emploi);
    public function update(Emploi $emploi);
    public function delete(int $id);
}
