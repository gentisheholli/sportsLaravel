<?php

namespace App\Repositories;

use App\Models\League;
use App\Repositories\Interfaces\LeagueRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class LeagueRepository implements LeagueRepositoryInterface
{
    public function all()
    {

        Log::info('Get all Leagues!');
        return League::orderBy('order')->get();

    }

    public function detail($id)
    {
        Log::info('Get League with id '.$id);

        return League::findOrFail($id);

    }


    public function create(array $data)
    {
        Log::info('Create new league');
        return League::create($data);
       
    }

    // public function update(array $data, $id)
    // { 

    //     $league = League::findOrFail($id);
        
    //     $league->name = $data['name'];
    //     $league->points = $data['points'];
    //     $league->order = $data['order'];
    //     $league->status = $data['status'];

    //     $league->update($data);

      
    //     return $league;



    // }

}
