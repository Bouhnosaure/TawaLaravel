<?php namespace App;

use App\Presenters\EventPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;

class Event extends Model implements SluggableInterface, HasPresenter
{
    use SluggableTrait;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'location',
        'is_private',
        'is_valid',
        'categorie_id',
        'categorie_id',
        'tags'
    ];

    protected $hidden = [];

    protected $dates = ['start_time', 'end_time'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return EventPresenter::class;
    }

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

    /**
     * An event is qualified by a category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * an event has many tags
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carpoolings()
    {
        return $this->hasMany('App\Carpooling');
    }


}
