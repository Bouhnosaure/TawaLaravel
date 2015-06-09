<?php namespace App;

use App\Presenters\CarpoolingPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;

class Carpooling extends Model implements SluggableInterface, HasPresenter
{
    use SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carpoolings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'description',
        'start_time',
        'seats',
        'price',
        'is_flexible',
        'is_luggage'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes handled as dates
     *
     * @var array
     */
    protected $dates = ['start_time'];

    /**
     * The attributes for the slug trait
     *
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    /**
     * function for getting the presenter of this model
     * @return mixed
     */
    public function getPresenterClass()
    {
        return CarpoolingPresenter::class;
    }

    //SCOPES
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

    //CUSTOM ATTRIBUTES

    public function getPresentDepartureAttribute()
    {
        return AutoPresenter::decorate($this)->departure;
    }

    public function getPresentArrivalAttribute()
    {
        return AutoPresenter::decorate($this)->arrival;
    }

    //RELATIONS
    /**
     * A Carpooling has One creator
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Carpooling has One event
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * A Carpooling has many Stopovers (waypoints)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stopovers()
    {
        return $this->hasMany('App\Stopover');
    }
}
