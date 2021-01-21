<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class League extends Model 
{

    protected $table = 'league';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','points','order','status'
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
  
    public function teams()
    {
        return $this->hasMany('App\Models\Team')->where('status','1');
    }


}
