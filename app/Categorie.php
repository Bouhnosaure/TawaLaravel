<?php namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [];

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    /**
     * An category can have many events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }

}
