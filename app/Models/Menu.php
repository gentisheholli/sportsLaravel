<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{

    protected $table = 'menu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','order','status'
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
  
    public function menu_item()
    {
        return $this->hasMany('App\Models\MenuItem')->where('status','1');
    }


}
