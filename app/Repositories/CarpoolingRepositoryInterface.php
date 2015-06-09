<?php namespace App\Repositories;

use App\User;

interface CarpoolingRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function getByDeparture($departure);

    public function create(User $user, Array $data, Array $stopovers);

    public function update($id, Array $data, Array $stopovers);

    public function delete($id);

    public function paginate($number);
}
