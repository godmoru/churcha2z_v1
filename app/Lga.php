<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lgas';
   
    public function getLga()
    {
     return $this->BelongsTo('App\State', 'state_code', 'state_code');
    }
}