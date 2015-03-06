<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stopover extends Model
{

    protected $table = 'stopovers';

    protected $fillable = [
        'location',
        'carpooling_order'
    ];

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
