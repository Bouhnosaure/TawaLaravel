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

    /**
     * get all events
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * return list of all events
     * @return mixed
     */
    public function getList()
    {
        return $this->model->latest('created_at')->NotFinished()->lists('name', 'id');
    }

    /**
     * event by id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * event by slug
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->orWhere('id', '=', $slug)->firstOrFail();
    }

    /**
     * create an event with an user
     * @param User $user
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(User $user, Array $data)
    {
        return $user->events()->create($data);
    }

    /**
     * update an event
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, Array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    /**
     * delete an event
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * create pagination
     * @param $number
     * @return mixed
     */
    public function paginate($number)
    {
        return $this->model->latest('created_at')->NotFinished()->paginate($number);
    }
}
