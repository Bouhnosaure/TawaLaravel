<?php namespace App;

use App\Presenters\CarpoolingPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;

class Carpooling extends Model implements SluggableInterface, HasPresenter
{

    use SluggableTrait;

    protected $table = 'carpoolings';

    protected $fillable = [
        'event_id',
        'description',
        'start_time',
        'seats',
        'price',
        'is_flexible',
        'is_luggage'
    ];

    protected $hidden = [];

    protected $dates = ['start_time'];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

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

    //RELATIONS

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
