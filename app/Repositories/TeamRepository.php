<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\Interfaces\TeamInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class TeamRepository implements TeamInterface
{
    public function all()
    {

        Log::info('Get all Teams!');
        return Team::orderBy('order')->get();

    }

    public function detail($id)
    {
        Log::info('Get Team with id '.$id);

        return Team::findOrFail($id);

    }


    public function create(array $data)
    {
        Log::info('Create new team');
        return Team::create($data);
       
    }

    public function update(array $data, $id)
    { 



        $team = Team::findOrFail($id);

        $team->league_id = $data['league_id'];
        $team->name = $data['name'];
        $team->nickname = $data['nickname'];
        $team->ground = $data['ground'];
        $team->website = $data['website'];
        $team->points = $data['points'];
        $team->order = $data['order'];
        $team->status = $data['ostatusrder'];

     
        $team->save();
     
        return $team;


    }

}
