<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stopover extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stopovers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location',
        'carpooling_order'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * A Stopover has one carpooling
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carpooling()
    {
        return $this->belongsTo('App\Carpooling');
    }

}
