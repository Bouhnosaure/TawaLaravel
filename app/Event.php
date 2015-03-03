<?php namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'location',
        'address',
        'is_private',
        'is_valid',
        'user_id'
    ];

    protected $hidden = [];

    protected $dates = ['start_time','end_time'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    /**
     * SCOPES
     */
    public function scopeNotFinished($query)
    {
        $query->where('end_time', '>=', Carbon::now());
    }

    public function scopeFinished($query)
    {
        $query->where('end_time', '<=', Carbon::now());
    }

    public function scopeNotStarted($query)
    {
        $query->where('start_time', '>=', Carbon::now());
    }

    public function scopeStarted($query)
    {
        $query->where('start_time', '<=', Carbon::now());
    }

    /**
     * MUTATORS
     */
    public function setUserIdAttribute($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function setStartTimeAttribute($date)
    {
        $this->attributes['start_time'] = Carbon::createFromFormat('d/m/Y - H:i', $date);
    }

    public function setEndTimeAttribute($date)
    {
        $this->attributes['end_time'] = Carbon::createFromFormat('d/m/Y - H:i', $date);;
    }

}
