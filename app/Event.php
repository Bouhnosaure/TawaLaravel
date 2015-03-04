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
        'is_valid'
    ];

    protected $hidden = [];

    protected $dates = ['start_time', 'end_time'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    //SCOPES

    /**
     * Scope event not finished
     * @param $query
     */
    public function scopeNotFinished($query)
    {
        $query->where('end_time', '>=', Carbon::now());
    }

    /**
     * Scope event finished
     * @param $query
     */
    public function scopeFinished($query)
    {
        $query->where('end_time', '<=', Carbon::now());
    }

    /**
     * Scope event not started
     * @param $query
     */
    public function scopeNotStarted($query)
    {
        $query->where('start_time', '>=', Carbon::now());
    }

    /**
     * Scope event started
     * @param $query
     */
    public function scopeStarted($query)
    {
        $query->where('start_time', '<=', Carbon::now());
    }

    //MUTATORS

    /**
     * Mutate start_time to FR with Carbon
     * @param $date
     * @return string
     */
    public function getStartTimeAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y - H:i');
    }

    /**
     * Mutate start_time from FR to Carbon date
     * @param $date
     */
    public function setStartTimeAttribute($date)
    {
        $this->attributes['start_time'] = Carbon::createFromFormat('d/m/Y - H:i', $date);
    }

    /**
     * Mutate end_time to FR with Carbon
     * @param $date
     * @return string
     */
    public function getEndTimeAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y - H:i');
    }

    /**
     * Mutate end_time from FR to Carbon date
     * @param $date
     */
    public function setEndTimeAttribute($date)
    {
        $this->attributes['end_time'] = Carbon::createFromFormat('d/m/Y - H:i', $date);
    }





    //RELATIONS


    /**
     * An event is owned by an user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
