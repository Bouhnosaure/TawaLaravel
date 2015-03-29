<?php namespace App\Repositories\Eloquent;

use App\Event;
use App\Repositories\EventRepositoryInterface;
use App\User;

class EventRepository implements EventRepositoryInterface
{
    /**
     * @var Event
     */
    private $model;

    /**
     * @param Event $event
     */
    public function __construct(Event $event)
    {

        $this->model = $event;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getList()
    {
        return $this->model->latest('created_at')->NotFinished()->lists('name', 'id');
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return $this->model->getBySlug($slug);
    }

    public function create(User $user, Array $data)
    {
        return $user->events()->create($data);
    }

    public function update($id, Array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function paginate($number)
    {
        return $this->model->latest('created_at')->NotFinished()->paginate($number);
    }

}