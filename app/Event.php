<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
