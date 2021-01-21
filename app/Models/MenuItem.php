<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MenuItem extends Model 
{
    protected $table = 'menu_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id','name','order','status'
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
        return $this->belongsTo('App\Menu');
    }


}
