<?php namespace App\Repositories;

use App\User;

interface EventRepositoryInterface
{
    public function getAll();

    public function getList();

    public function getById($id);

    public function getBySlug($slug);

    public function create(User $user, Array $data);

    public function update($id, Array $data);

    public function delete($id);

    public function paginate($number);

}