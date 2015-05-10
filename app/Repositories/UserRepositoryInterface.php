<?php namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAll();

    public function getList();

    public function getById($id);

    public function getByName($name);

    public function create(Array $data);

    public function update($id, Array $data);

    public function delete($id);

    public function paginate($number);

}