<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model 
{
    protected $table = 'team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id','name','nickname','ground','website','points','order','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function item()
    {
        return $this->belongsTo('App\League');
    }


}
