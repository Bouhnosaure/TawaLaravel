<?php namespace App\Repositories\Eloquent;

use App\Carpooling;
use App\Repositories\CarpoolingRepositoryInterface;
use App\User;

class CarpoolingRepository implements CarpoolingRepositoryInterface
{
    /**
     * @var Event
     */
    private $model;

    /**
     * @param Carpooling $carpooling
     */
    public function __construct(Carpooling $carpooling)
    {

        $this->model = $carpooling;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getByDeparture($departure)
    {
        // TODO: Implement getByDeparture() method.
    }

    public function create(User $user, Array $data, Array $stopovers = array())
    {
        $model = $user->carpoolings()->create($data);
        $model->stopovers()->saveMany($stopovers);
        return $model;
    }

    public function update($id, Array $data, Array $stopovers = array())
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        $model->stopovers()->delete();
        $model->stopovers()->saveMany($stopovers);
        return $model;
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function paginate($number)
    {
        return $this->model->latest('created_at')->NotStarted()->paginate($number);
    }
}