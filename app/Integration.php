<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'api_key', 'api_secret', 
    ]; 

    public function user() 
    {
    	return $this->belongsTo(User::class); 
    }
}
